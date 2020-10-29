<?php

declare(strict_types=1);

namespace app\commands;

use app\exceptions\FIAS\FiasParseServiceException;
use app\services\FiasParseService;
use app\utils\Zip;
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

    public function actionIndex(string $zipFilename): int
    {
        $startTime = microtime(true);

        $zip = new Zip();

        try {
            if (!$zip->open($zipFilename, \ZipArchive::RDONLY)) {
                throw new \RuntimeException('Can not open zip file ' . $zipFilename);
            }

            foreach ($zip->getFilename() as $fileInZip) {
                $filename = $zipFilename . '#' . $fileInZip;

                print 'FILE ' . $filename . PHP_EOL;
                $count = $this->parseService->parseFile($filename);
                print 'Number of items: ' . $count . PHP_EOL;
            }
        } catch (\RuntimeException|FiasParseServiceException $e) {
            die($e->getMessage());
        }

        $endTime = microtime(true);

        print 'memory_get_usage(): ' . memory_get_usage() / 1024 . 'kb' . PHP_EOL;
        print 'memory_get_usage(true): ' . memory_get_usage(true) / 1024 . 'kb' . PHP_EOL;
        print 'memory_get_peak_usage(): ' . memory_get_peak_usage() / 1024 . 'kb' . PHP_EOL;
        print 'memory_get_peak_usage(true): ' . memory_get_peak_usage(true) / 1024 . 'kb' . PHP_EOL;
        print 'Time: ' . ($endTime - $startTime) . PHP_EOL;

        return ExitCode::OK;
    }

    public function actionGetDownloadUrl(): void
    {
        $fiasSourceInfoUrl = \Yii::$app->params['fiasSourceInfoUrl'];
        $urlsString = file_get_contents($fiasSourceInfoUrl);
        $urls = json_decode($urlsString, false, 512, JSON_THROW_ON_ERROR);
        echo $urls->GarXMLFullURL;
    }
}
