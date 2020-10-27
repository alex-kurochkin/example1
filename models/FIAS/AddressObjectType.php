<?php

declare(strict_types=1);

namespace app\models\FIAS;

class AddressObjectType extends AbstractFiasModel
{

    protected array $map = [
        'id' => 'id',
        'level' => 'level',
        'name' => 'name',
        'shortName' => 'short_name',
        'desc' => 'desc',
    ];

    protected string $id;
    protected string $level;
    protected string $name;
    protected string $shortName;
    protected string $desc;

    public static function tableName(): string
    {
        return 'address_object_types';
    }
}
