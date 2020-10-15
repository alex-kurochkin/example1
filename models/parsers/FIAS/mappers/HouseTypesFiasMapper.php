<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class HouseTypesFiasMapper extends AbstractFiasMapper
{

    /** <HOUSETYPE ID="1" NAME="Владение" SHORTNAME="влд." DESC="Владение" STARTDATE="1900-01-01" ENDDATE="2015-11-05" UPDATEDATE="1900-01-01" ISACTIVE="false" /> */

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
