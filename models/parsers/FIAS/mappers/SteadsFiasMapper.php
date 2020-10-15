<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class SteadsFiasMapper extends AbstractFiasMapper
{

    /** <STEAD
     * ID="8798839"
     * OBJECTID="93332272"
     * OBJECTGUID="7afb5d47-81f3-4da4-876d-818cbc19925c"
     * CHANGEID="136213878"
     * NUMBER="29"
     * OPERTYPEID="10"
     * NEXTID="0"
     * STARTDATE="2019-09-13"
     * ENDDATE="2079-06-06"
     * UPDATEDATE="2019-09-17"
     * ISACTIVE="1"
     * ISACTUAL="1" />
     */

    protected array $map = [
        'ID' => 'id',
        'OBJECTID' => 'object_id',
        'OBJECTGUID' => 'object_guid',
        'CHANGEID' => 'change_id',
        'NUMBER' => 'number',
        'OPERTYPEID' => 'operation_type_id',
        'NEXTID' => 'next_id',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
        'UPDATEDATE' => 'update_date',
        'ISACTIVE' => 'is_active',
        'ISACTUAL' => 'is_actual',
    ];
}
