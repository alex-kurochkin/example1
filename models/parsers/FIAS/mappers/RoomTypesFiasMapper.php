<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class RoomTypesFiasMapper extends AbstractFiasMapper
{

    /** <ROOMTYPE ID="0" NAME="Не определено" DESC="Не определено" STARTDATE="1900-01-01" ENDDATE="2015-11-05" UPDATEDATE="2011-01-01" ISACTIVE="true" /> */

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
