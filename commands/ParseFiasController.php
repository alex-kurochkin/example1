<?php

declare(strict_types=1);

namespace app\commands;

use app\models\parsers\FIAS\FiasParser;
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
        print 'custom memory_get_process_usage(): ' . memory_get_process_usage() . 'kb' . PHP_EOL;
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

        $parser = FiasParser::getParser($filename);
        $parser->parse();

        print 'Number of items: ' . $parser->getCountIx() . PHP_EOL;
    }
}

/**
 * Returns memory usage from /proc<PID>/status in bytes.
 *
 * @return int|bool sum of VmRSS and VmSwap in bytes. On error returns false.
 */
function memory_get_process_usage()
{
    $status = file_get_contents('/proc/' . getmypid() . '/status');

    $m = [];
    preg_match_all('~^(VmRSS|VmSwap):\s*(\d+).*$~im', $status, $m);

    if (!isset($m[2][0], $m[2][1])) {
        return false;
    }

    return (int)$m[2][0] + (int)$m[2][1];
}