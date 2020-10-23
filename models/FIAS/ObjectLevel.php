<?php

declare(strict_types=1);

namespace app\models\FIAS;

class ObjectLevel extends AbstractFiasModel
{

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
    protected \DateTimeInterface $startDate;
    protected \DateTimeInterface $endDate;
    protected \DateTimeInterface $updateDate;
    protected bool $isActive;

    public static function tableName(): string
    {
        return 'ObjectLevels';
    }
}
