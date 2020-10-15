<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class ParamTypesFiasMapper extends AbstractFiasMapper
{

    /** <PARAMTYPE ID="1" NAME="ИФНС ФЛ" DESC="ИФНС ФЛ" CODE="IFNSFL" STARTDATE="2011-11-01" ENDDATE="2079-06-06" UPDATEDATE="2018-06-15" ISACTIVE="true" /> */

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
