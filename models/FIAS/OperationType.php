<?php

declare(strict_types=1);

namespace app\models\FIAS;

class OperationType extends AbstractFiasModel
{

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
    protected \DateTimeInterface $startDate;
    protected \DateTimeInterface $endDate;
    protected \DateTimeInterface $updateDate;
    protected bool $isActive;

    public static function tableName(): string
    {
        return 'OperationTypes';
    }
}
