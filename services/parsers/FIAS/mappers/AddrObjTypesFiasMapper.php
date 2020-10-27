<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;

class AddrObjTypesFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => [
            'name' => 'id',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'LEVEL' => [
            'name' => 'level',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'NAME' => 'name',
        'SHORTNAME' => 'short_name',
        'DESC' => 'desc',

        'ISACTIVE' => [
            'name' => 'is_active',
            'value' => [
                'type' => 'bool',
            ]
        ],
    ];
}
