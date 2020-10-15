<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class ApartmentsFiasMapper extends AbstractFiasMapper
{

    /** <APARTMENT
     * ID="13508747"
     * OBJECTID="23890287"
     * OBJECTGUID="f102626c-5427-4051-aca8-5f674e28e3a5"
     * CHANGEID="37083410"
     * NUMBER="93"
     * APARTTYPE="2"
     * OPERTYPEID="10"
     * PREVID="0"
     * NEXTID="0"
     * STARTDATE="2017-04-07"
     * ENDDATE="2079-06-06"
     * UPDATEDATE="2017-04-07"
     * ISACTIVE="1"
     * ISACTUAL="1" />
     */

    protected array $map = [
        'ID' => 'id',
        'OBJECTID' => 'object_id',
        'OBJECTGUID' => 'object_guid',
        'CHANGEID' => 'change_id',
        'NUMBER' => 'number',
        'APARTTYPE' => 'apartment_type',
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
