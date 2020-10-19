<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class RoomTypesFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => 'id',
        'NAME' => 'name',
        'SHORTNAME' => 'short_name',
        'DESC' => 'desc',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
        'UPDATEDATE' => 'update_date',
        'ISACTIVE' => 'is_active',
    ];
}
