<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class ParamTypesFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => 'id',
        'NAME' => 'name',
        'DESC' => 'desc',
        'CODE' => 'code',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
        'UPDATEDATE' => 'update_date',
        'ISACTIVE' => 'is_active',
    ];
}
