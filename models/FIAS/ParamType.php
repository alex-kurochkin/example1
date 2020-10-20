<?php

declare(strict_types=1);

namespace app\models\FIAS;

class ParamType extends AbstractFiasModel
{

    protected string $tableName = 'ParamTypes';

    protected array $map = [
        'id' => 'id',
        'name' => 'name',
        'desc' => 'desc',
        'code' => 'code',
        'startDate' => 'start_date',
        'endDate' => 'end_date',
        'updateDate' => 'update_date',
        'isActive' => 'is_active',

    ];

    protected string $id;
    protected string $name;
    protected string $desc;
    protected string $code;
    protected \DateTime $startDate;
    protected \DateTime $endDate;
    protected \DateTime $updateDate;
    protected string $isActive;

}
