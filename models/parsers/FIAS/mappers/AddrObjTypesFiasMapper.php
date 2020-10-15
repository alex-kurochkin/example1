<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class AddrObjTypesFiasMapper extends AbstractFiasMapper
{

    /** <ADDRESSOBJECTTYPE
     * ID="5"
     * LEVEL="1"
     * NAME="Автономная область"
     * SHORTNAME="Аобл"
     * DESC="Автономная область"
     * STARTDATE="1900-01-01"
     * ENDDATE="2015-11-05"
     * UPDATEDATE="1900-01-01"
     * ISACTIVE="true"/>
     */

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
