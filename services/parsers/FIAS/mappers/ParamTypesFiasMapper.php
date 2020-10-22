<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class ParamTypesFiasMapper extends AbstractFiasMapper
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
        'DESC' => 'desc',
        'CODE' => 'code',
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
