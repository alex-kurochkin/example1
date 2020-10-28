<?php

declare(strict_types=1);

namespace app\services;

use app\exceptions\LoaderServiceException;
use app\models\FIAS\AbstractFiasModel;
use Exception;
use stdClass;

class DataDbLoaderService
{

    private int $maxWriteCount = 5000;

    private int $count = 0;

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
        $this->model->collect($record);

        $this->count++;

        if ($this->count >= $this->maxWriteCount) {
            $this->save();
            $this->count = 0;
        }
    }

    /**
     * @throws LoaderServiceException
     */
    private function save(): void
    {
        try {
            $this->model->saveMany();
        } catch (Exception $e) {
            throw new LoaderServiceException(__CLASS__ . ' can not save data portion ' . $e->getMessage());
        }
    }
}
