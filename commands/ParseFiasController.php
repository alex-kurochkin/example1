<?php

declare(strict_types=1);

namespace app\commands;

use app\models\parsers\FIAS\AbstractFiasParser;
use yii\console\Controller;
use yii\console\ExitCode;

class ParseFiasController extends Controller
{

    public function actionIndex(): int
    {
        $startTime = microtime(true);

        $sourceRootDir = \Yii::$app->params['fiasSourceRootDir'];

        foreach (glob($sourceRootDir . '/*') as $fn) {

            if (is_dir($fn) && preg_match('/^\d{2}$/', basename($fn))) {
                $this->parseSourceDir($fn);
            }

            if (is_file($fn) && preg_match('/^.+\.xml$/i', basename($fn))) {
                $this->parseFile($fn);
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

            $this->parseFile($filename);
        }
    }

    private function parseFile(string $filename): void
    {
        print 'FILE ' . $filename . PHP_EOL;

        $parser = AbstractFiasParser::getParser($filename);
        $parser->parse();

        print 'Number of items: ' . $parser->getRecordsCount() . PHP_EOL;
    }
}
