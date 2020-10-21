<?php

declare(strict_types=1);

namespace app\commands;

use app\models\FIAS\AbstractFiasModel;
use app\services\parsers\FIAS\AbstractFiasParser;
use app\services\DataDbLoaderService;
use app\utils\FIAS\FiasFile;
use yii\console\Controller;
use yii\console\ExitCode;

class ParseFiasController extends Controller
{

    private static array $fiasToModel = [
        'AddhouseTypes' => 'HouseType',
//        'AddrObjDivision' => 'AddressObjectDivision',
        'AddrObj' => 'AddressObject',
//        'AddrObjParams' => 'AddressObjectParam',
        'AddrObjTypes' => 'AddressObjectType',
//        'AdmHierarchy' => 'AdministrativeHierarchy',
//        'Apartments' => 'Apartment',
//        'ApartmentsParams' => 'ApartmentParam',
        'ApartmentTypes' => 'ApartmentType',
//        'Carplaces' => 'Carplace',
//        'CarplacesParams' => 'CarplaceParam',
//        'ChangeHistory' => 'ChangeHistory',
//        'Houses' => 'House',
//        'HousesParams' => 'HouseParam',
        'HouseTypes' => 'HouseType',
//        'MunHierarchy' => 'MunicipalityHierarchy',
//        'NormativeDocs' => 'NormativeDoc',
        'NormativeDocsKinds' => 'NormativeDocKind',
        'NormativeDocsTypes' => 'NormativeDocType',
        'ObjectLevels' => 'ObjectLevel',
        'OperationTypes' => 'OperationType',
        'ParamTypes' => 'ParamType',
//        'ReestrObjects' => 'RegistryObject',
//        'Rooms' => 'Room',
//        'RoomsParams' => 'RoomParam',
        'RoomTypes' => 'RoomType',
//        'Steads' => 'Stead',
//        'SteadsParams' => 'SteadParam',
    ];

    public function actionIndex(): int
    {
        $startTime = microtime(true);

        $sourceRootDir = \Yii::$app->params['fiasSourceRootDir'];

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
}
