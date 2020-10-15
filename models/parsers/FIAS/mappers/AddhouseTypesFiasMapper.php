<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class AddhouseTypesFiasMapper extends AbstractFiasMapper
{

    /** <HOUSETYPE ID="1" NAME="Корпус" SHORTNAME="к." DESC="Корпус" STARTDATE="2015-12-25" ENDDATE="2079-06-06" UPDATEDATE="2015-12-25" ISACTIVE="true" /> */

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
