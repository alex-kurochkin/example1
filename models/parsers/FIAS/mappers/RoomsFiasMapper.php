<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class RoomsFiasMapper extends AbstractFiasMapper
{

    /** <ROOM
     * ID="49"
     * OBJECTID="1489823"
     * OBJECTGUID="21e9b89d-77ab-4a34-8234-f5ca76346c1f"
     * CHANGEID="4107088"
     * NUMBER="1"
     * ROOMTYPE="1"
     * OPERTYPEID="10"
     * PREVID="0"
     * NEXTID="0"
     * STARTDATE="2019-03-03"
     * ENDDATE="2079-06-06"
     * UPDATEDATE="2019-03-03"
     * ISACTIVE="1"
     * ISACTUAL="1" />
     */

    protected array $map = [
        'ID' => 'id',
        'OBJECTID' => 'object_id',
        'OBJECTGUID' => 'object_guid',
        'CHANGEID' => 'change_id',
        'NUMBER' => 'number',
        'ROOMTYPE' => 'room_type',
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
