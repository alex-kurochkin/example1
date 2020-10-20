<?php

declare(strict_types=1);

namespace app\models\FIAS;

class ObjectLevel extends AbstractFiasModel
{

    protected string $tableName = 'ObjectLevels';

    protected array $map = [
        'level' => 'level',
        'name' => 'name',
        'shortName' => 'short_name',
        'startDate' => 'start_date',
        'endDate' => 'end_date',
        'updateDate' => 'update_date',
        'isActive' => 'is_active',
    ];

    protected string $level;
    protected string $name;
    protected string $shortName;
    protected \DateTime $startDate;
    protected \DateTime $endDate;
    protected \DateTime $updateDate;
    protected bool $isActive;
}
