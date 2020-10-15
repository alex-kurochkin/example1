<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class HousesFiasMapper extends AbstractFiasMapper
{

    /** <HOUSE
     * ID="2911"
     * OBJECTID="1465592"
     * OBJECTGUID="92158079-3e75-47f5-af2b-0680dce54faa"
     * CHANGEID="4068858"
     * HOUSENUM="3"
     * HOUSETYPE="2"
     * OPERTYPEID="10"
     * PREVID="0"
     * NEXTID="2913"
     * STARTDATE="1900-01-01"
     * ENDDATE="2013-01-01"
     * UPDATEDATE="2012-03-13"
     * ISACTIVE="0"
     * ISACTUAL="0" />
     */

    protected array $map = [
        'ID' => 'id',
        'OBJECTID' => 'object_id',
        'OBJECTGUID' => 'object_guid',
        'CHANGEID' => 'change_id',
        'HOUSENUM' => 'house_number',
        'HOUSETYPE' => 'house_type',
        'OPERTYPEID' => 'operation_type_id',
        'PREVID' => 'prev_id',
        'NEXTID' => 'next_id',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
        'UPDATEDATE' => 'update_date',
        'ISACTIVE' => 'is_active',
        'ISACTUAL' => 'is_actual',
    ];
}
