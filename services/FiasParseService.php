<?php

declare(strict_types=1);

namespace app\services;

use app\exceptions\FIAS\FiasParseServiceException;
use app\exceptions\LoaderServiceException;
use app\models\FIAS\AbstractFiasModel;
use app\services\parsers\FIAS\AbstractFiasParser;
use app\services\parsers\FIAS\FiasParserInterface;
use app\utils\FIAS\FiasFile;

class FiasParseService
{

    private static array $fiasToModel = [
        'AddrObj' => 'AddressObject',
        'AdmHierarchy' => 'AdministrativeHierarchy',
        'AddrObjTypes' => 'AddressObjectType',
        'ObjectLevels' => 'ObjectLevel',
    ];

    /**
     * @param string $filename
     * @return int
     * @throws FiasParseServiceException
     */
    public function parseFile(string $filename): int
    {
        $modelName = $this->getModelName($filename);

        if (!$modelName) {
            return 0;
        }

        $model = AbstractFiasModel::getModel($modelName);

        $fiasName = FiasFile::parseEntityName(basename($filename));

        $parser = AbstractFiasParser::getParser($fiasName);
        $parser->setReader($filename);

        try {
            return $this->parseSourceFile($parser, $model);
        } catch (LoaderServiceException $e) {
            throw new FiasParseServiceException(
                __METHOD__ . ' Can not parse file - caught exception: ' . $e->getMessage()
            );
        }
    }

    /**
     * @param FiasParserInterface $parser
     * @param AbstractFiasModel $model
     * @return int
     * @throws LoaderServiceException
     */
    private function parseSourceFile(FiasParserInterface $parser, AbstractFiasModel $model): int
    {
        $dataLoader = new DataDbLoaderService($model);

        foreach ($parser->parse() as $element) {

            if (!$parser->checkIsACtive($element)) {
                continue;
            }

            $element = $parser->trim($element);

            $dataLoader->load($element);
        }

        return $parser->getRecordsCount();
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
