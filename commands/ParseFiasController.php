<?php

declare(strict_types=1);

namespace app\commands;

use app\exceptions\LoaderServiceException;
use app\models\FIAS\AbstractFiasModel;
use app\services\parsers\FIAS\AbstractFiasParser;
use app\services\DataDbLoaderService;
use app\utils\FIAS\FiasFile;
use yii\console\Controller;
use yii\console\ExitCode;

class ParseFiasController extends Controller
{

    private static array $fiasToModel = [
        'AddrObj' => 'AddressObject',
        'AdmHierarchy' => 'AdministrativeHierarchy',
        'AddrObjTypes' => 'AddressObjectType',
        'ObjectLevels' => 'ObjectLevel',
    ];

    /**
     * @param string $sourceRootDir
     * @return int
     * @throws LoaderServiceException
     */
    public function actionIndex(string $sourceRootDir): int
    {
        $startTime = microtime(true);

        foreach (glob($sourceRootDir . '/*') as $filename) {
            if (is_dir($filename) && preg_match('/^\d{2}$/', basename($filename))) {
                $this->parseSourceDir($filename);
            }

            if (is_file($filename) && preg_match('/^.+\.xml$/i', basename($filename))) {
                $modelName = $this->getModelName($filename);

                if (!$modelName) {
                    continue;
                }

                $model = AbstractFiasModel::getModel(basename($modelName));
                $this->parseFile($filename, $model);
            }
        }

        $endTime = microtime(true);

        print 'memory_get_usage(): ' . memory_get_usage() / 1024 . 'kb' . PHP_EOL;
        print 'memory_get_usage(true): ' . memory_get_usage(true) / 1024 . 'kb' . PHP_EOL;
        print 'memory_get_peak_usage(): ' . memory_get_peak_usage() / 1024 . 'kb' . PHP_EOL;
        print 'memory_get_peak_usage(true): ' . memory_get_peak_usage(true) / 1024 . 'kb' . PHP_EOL;
        print 'Time: ' . ($endTime - $startTime) . PHP_EOL;

        return ExitCode::OK;
    }

    /**
     * @param string $sourceDir
     * @throws LoaderServiceException
     */
    private function parseSourceDir(string $sourceDir): void
    {
        print 'DIR ' . $sourceDir . PHP_EOL;

        foreach (glob($sourceDir . '/*.[xX][mM][lL]') as $filename) {
            $modelName = $this->getModelName($filename);

            if (!$modelName) {
                continue;
            }

            $model = AbstractFiasModel::getModel($modelName);
            $this->parseFile($filename, $model);
        }
    }

    /**
     * @param string $filename
     * @param AbstractFiasModel $model
     * @throws LoaderServiceException
     */
    private function parseFile(string $filename, AbstractFiasModel $model): void
    {
        print 'FILE ' . $filename . PHP_EOL;

        $dataLoader = new DataDbLoaderService($model);

        $parser = AbstractFiasParser::getParser($filename);

        foreach ($parser->parse() as $element) {
            $dataLoader->load($element);
        }

        print 'Number of items: ' . $parser->getRecordsCount() . PHP_EOL;
    }

    private function getModelName(string $filename): string
    {
        $fiasName = FiasFile::parseEntityName(basename($filename));

        if (array_key_exists($fiasName, self::$fiasToModel)) {
            return self::$fiasToModel[$fiasName];
        }

        return '';
    }

    public function actionGetDownloadUrl(): void
    {
        $fiasSourceInfoUrl = \Yii::$app->params['fiasSourceInfoUrl'];
        $urlsString = file_get_contents($fiasSourceInfoUrl);
        $urls = json_decode($urlsString, false, 512, JSON_THROW_ON_ERROR);
        echo $urls->GarXMLFullURL;
    }
}
