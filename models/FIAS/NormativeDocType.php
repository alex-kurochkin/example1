<?php

declare(strict_types=1);

namespace app\models\FIAS;

class NormativeDocType extends AbstractFiasModel
{

    protected array $map = [
        'id' => 'id',
        'name' => 'name',
        'startDate' => 'start_date',
        'endDate' => 'end_date',
    ];

    protected string $id;
    protected string $name;
    protected \DateTimeInterface $startDate;
    protected \DateTimeInterface $endDate;

    public static function tableName(): string
    {
        return 'NormativeDocTypes';
    }
}
