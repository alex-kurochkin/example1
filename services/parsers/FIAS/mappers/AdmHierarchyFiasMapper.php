<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;

class AdmHierarchyFiasMapper extends AbstractFiasMapper
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
        'CHANGEID' => [
            'name' => 'change_id',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'PARENTOBJID' => [
            'name' => 'parent_object_id',
            'value' => [
                'type' => 'int',
                'nullable' => true,
            ]
        ],
        'REGIONCODE' => 'region_code',
        'AREACODE' => 'area_code',
        'CITYCODE' => 'city_code',
        'PLACECODE' => 'place_code',
        'PLANCODE' => 'plan_code',
        'STREETCODE' => 'street_code',

        'ISACTIVE' => [
            'name' => 'is_active',
            'value' => [
                'type' => 'bool',
            ]
        ],
    ];
}
