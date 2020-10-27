<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;

class AddrObjFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => [
            'name' => 'id',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'OBJECTID' => [
            'name' => 'object_id',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'OBJECTGUID' => 'object_guid',
        'CHANGEID' => [
            'name' => 'change_id',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'NAME' => 'name',
        'TYPENAME' => 'type_name',
        'LEVEL' => [
            'name' => 'level',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],

        'ISACTIVE' => [
            'name' => 'is_active',
            'value' => [
                'type' => 'bool',
            ]
        ],
        'ISACTUAL' => [
            'name' => 'is_actual',
            'value' => [
                'type' => 'bool',
            ]
        ],
    ];
}
