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

        $sourceDir = '/media/alex/C682E07882E06E7D/FIAS/XML/55/';

        foreach (glob($sourceDir . '*.[xX][mM][lL]') as $filename) {
            $parser = FiasParser::getParser($filename);
            $parser->parse();

            print $filename . PHP_EOL;
            print 'Number of items: ' . $parser->getCountIx() . PHP_EOL;
//            break;
        }

//        $fn = '/media/alex/C682E07882E06E7D/FIAS/XML/55/AS_ADDR_OBJ_20201010_d0ad0605-d3f2-436e-a48b-df84e340f59e.XML';
//        $parser = new AddrObjFiasParser($fn);
//        $parser->parse();
//        $fn = '/media/alex/C682E07882E06E7D/FIAS/XML/55/AS_HOUSES_PARAMS_20201010_79d23bd0-468a-4cea-9128-9821fc53af01.XML';
//        $parser = new HousesParamsFIASParser($fn);
//        $parser->parse();

        $endTime = microtime(true);

        print 'memory_get_usage(): ' . memory_get_usage() / 1024 . 'kb' . PHP_EOL;
        print 'memory_get_usage(true): ' . memory_get_usage(true) / 1024 . 'kb' . PHP_EOL;
        print 'memory_get_peak_usage(): ' . memory_get_peak_usage() / 1024 . 'kb' . PHP_EOL;
        print 'memory_get_peak_usage(true): ' . memory_get_peak_usage(true) / 1024 . 'kb' . PHP_EOL;
        print 'custom memory_get_process_usage(): ' . memory_get_process_usage() . 'kb' . PHP_EOL;
        print 'Time: ' . ($endTime - $startTime) . PHP_EOL;

        return ExitCode::OK;
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