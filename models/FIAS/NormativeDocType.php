<?php

declare(strict_types=1);

namespace app\models\FIAS;

class NormativeDocType extends AbstractFiasModel
{

    protected string $tableName = 'NormativeDocTypes';

    protected array $map = [
        'id' => 'id',
        'name' => 'name',
        'startDate' => 'start_date',
        'endDate' => 'end_date',
    ];

    protected string $id;
    protected string $name;
    protected \DateTime $startDate;
    protected \DateTime $endDate;
}
