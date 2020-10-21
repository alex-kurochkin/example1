<?php

declare(strict_types=1);

namespace app\models\FIAS;

class AdditionalHouseType extends AbstractFiasModel
{

    protected string $tableName = 'AdditionalHouseTypes';

    protected array $map = [
        'id' => 'id',
        'name' => 'name',
        'shortName' => 'short_name',
        'desc' => 'desc',
        'startDate' => 'start_date',
        'endDate' => 'end_date',
        'updateDate' => 'update_date',
        'isActive' => 'is_active',
    ];

    protected string $id;
    protected string $name;
    protected string $shortName;
    protected string $desc;
    protected \DateTime $startDate;
    protected \DateTime $endDate;
    protected \DateTime $updateDate;
    protected bool $isActive;
}
