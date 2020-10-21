<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class AddrObjTypesFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => 'id',
        'LEVEL' => 'level',
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
