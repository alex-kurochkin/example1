<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class ApartmentTypesFiasMapper extends AbstractFiasMapper
{

    /** <APARTMENTTYPE
     * ID="1"
     * NAME="Помещение"
     * SHORTNAME="помещение"
     * DESC="Помещение"
     * STARTDATE="1900-01-01"
     * ENDDATE="2079-06-06"
     * UPDATEDATE="1900-01-01"
     * ISACTIVE="1"/>
     */

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
