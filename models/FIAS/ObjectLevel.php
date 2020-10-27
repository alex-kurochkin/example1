<?php

declare(strict_types=1);

namespace app\models\FIAS;

class ObjectLevel extends AbstractFiasModel
{

    protected array $map = [
        'level' => 'level',
        'name' => 'name',
        'shortName' => 'short_name',
    ];

    protected string $level;
    protected string $name;
    protected string $shortName;

    public static function tableName(): string
    {
        return 'object_levels';
    }
}
