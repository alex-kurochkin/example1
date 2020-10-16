<?php

declare(strict_types=1);

namespace app\commands;

use app\models\FIAS\AddressObject;
use app\models\FIAS\House;
use app\models\parsers\FIAS\AbstractFiasParser;
use app\services\DataDbLoaderService;
use yii\console\Controller;
use yii\console\ExitCode;

class ParseFiasController extends Controller
{

    private DataDbLoaderService $dataLoader;

    public function actionIndex(): int
    {
        $startTime = microtime(true);

        $sourceRootDir = \Yii::$app->params['fiasSourceRootDir'];

        /** test DataDbLoaderService for one file */
        $model = new AddressObject();
        $fn = '/media/alex/C682E07882E06E7D/FIAS/XML/55/AS_ADDR_OBJ_20201010_d0ad0605-d3f2-436e-a48b-df84e340f59e.XML';

//        $model = new Houses();
//        $fn = '/media/alex/C682E07882E06E7D/FIAS/XML/55/AS_HOUSES_20201010_517c7f47-c8e5-418f-be22-8c5ac21b11be.XML';

        $this->dataLoader = new DataDbLoaderService($model);
        $this->parseFile(
            $fn
        );

//        foreach (glob($sourceRootDir . '/*') as $fn) {
//
//            if (is_dir($fn) && preg_match('/^\d{2}$/', basename($fn))) {
//                $this->parseSourceDir($fn);
//            }
//
//            if (is_file($fn) && preg_match('/^.+\.xml$/i', basename($fn))) {
//                $this->parseFile($fn);
//            }
//        }

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
            $this->parseFile($filename);
        }
    }

    private function parseFile(string $filename): void
    {
        print 'FILE ' . $filename . PHP_EOL;

        $parser = AbstractFiasParser::getParser($filename);

        foreach ($parser->parse() as $element) {
            $this->dataLoader->load($element);
        }

        print 'Number of items: ' . $parser->getRecordsCount() . PHP_EOL;
    }
}
