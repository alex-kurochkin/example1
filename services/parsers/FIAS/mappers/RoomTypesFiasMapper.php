<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class RoomTypesFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => [
            'name' => 'id',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'NAME' => 'name',
        'SHORTNAME' => 'short_name',
        'DESC' => 'desc',
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
