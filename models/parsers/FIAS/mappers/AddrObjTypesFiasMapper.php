<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


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
        'ISACTIVE' => 'is_active',
    ];
}
