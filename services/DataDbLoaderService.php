<?php

declare(strict_types=1);

namespace app\services;

use app\exceptions\LoaderServiceException;
use app\models\FIAS\AbstractFiasModel;
use Exception;
use stdClass;

class DataDbLoaderService
{

    private int $maxWritePullCount = 1000;

    private array $recordsPull = [];

    private AbstractFiasModel $model;

    public function __construct(AbstractFiasModel $model)
    {
        $this->model = $model;
    }

    private function __clone()
    {
    }

    /**
     * @throws LoaderServiceException
     */
    public function __destruct()
    {
        $this->save();
    }

    /**
     * @param stdClass $record
     * @throws LoaderServiceException
     */
    public function load(stdClass $record): void
    {
        $this->recordsPull[] = $record;

        if (count($this->recordsPull) >= $this->maxWritePullCount) {
            $this->save();
        }
    }

    /**
     * @throws LoaderServiceException
     */
    private function save(): void
    {
        try {
            $this->model->saveMany($this->recordsPull);
            $this->recordsPull = [];
        } catch (Exception $e) {
            throw new LoaderServiceException(__CLASS__ . ' can not save data portion ' . $e->getMessage());
        }
    }
}
