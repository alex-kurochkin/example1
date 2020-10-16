<?php

declare(strict_types=1);

namespace app\services;

use app\models\FIAS\AbstractFiasModel;
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

    public function __destruct()
    {
        $this->write();
    }

    public function load(stdClass $record): void
    {
        $this->recordsPull[] = $record;

        if (count($this->recordsPull) >= $this->maxWritePullCount) {
            $this->write();
        }
    }

    private function write(): void
    {
        $this->model->loadMany($this->recordsPull);
        $this->recordsPull = [];
    }
}
