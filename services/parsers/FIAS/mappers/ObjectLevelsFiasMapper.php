<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class ObjectLevelsFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'LEVEL' => [
            'name' => 'level',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'NAME' => 'name',
        'SHORTNAME' => 'short_name',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
        'UPDATEDATE' => 'update_date',
        'ISACTIVE' => [
            'name' => 'is_active',
            'value' => [
                'type' => 'bool',
            ]
        ],
    ];
}
