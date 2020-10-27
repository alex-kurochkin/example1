<?php

declare(strict_types=1);

namespace app\commands;

use app\exceptions\FIAS\FiasParseServiceException;
use app\services\FiasParseService;
use yii\console\Controller;
use yii\console\ExitCode;

class ParseFiasController extends Controller
{

    private FiasParseService $parseService;

    public function __construct($id, $module, FiasParseService $parseService, $config = [])
    {
        $this->parseService = $parseService;
        parent::__construct($id, $module, $config);
    }

    /**
     * @param string $sourceRootDir
     * @return int
     * @throws FiasParseServiceException
     */
    public function actionIndex(string $sourceRootDir): int
    {
        $startTime = microtime(true);

        foreach (glob($sourceRootDir . '/*') as $filename) {
            if (is_dir($filename) && preg_match('/^\d{2}$/', basename($filename))) {
                $this->parseSourceDir($filename);
            }

            if (is_file($filename) && preg_match('/^.+\.xml$/i', basename($filename))) {
                print 'FILE ' . $filename . PHP_EOL;
                $count = $this->parseService->parseFile($filename);
                print 'Number of items: ' . $count . PHP_EOL;
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
     * @throws FiasParseServiceException
     */
    private function parseSourceDir(string $sourceDir): void
    {
        print 'DIR ' . $sourceDir . PHP_EOL;

        foreach (glob($sourceDir . '/*.[xX][mM][lL]') as $filename) {
            print 'FILE ' . $filename . PHP_EOL;
            $count = $this->parseService->parseFile($filename);
            print 'Number of items: ' . $count . PHP_EOL;
        }
    }

    public function actionGetDownloadUrl(): void
    {
        $fiasSourceInfoUrl = \Yii::$app->params['fiasSourceInfoUrl'];
        $urlsString = file_get_contents($fiasSourceInfoUrl);
        $urls = json_decode($urlsString, false, 512, JSON_THROW_ON_ERROR);
        echo $urls->GarXMLFullURL;
    }
}
