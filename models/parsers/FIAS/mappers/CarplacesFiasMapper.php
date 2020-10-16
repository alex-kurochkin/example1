<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class CarplacesFiasMapper extends AbstractFiasMapper
{

    /** <CARPLACE
     * ID="12182167"
     * OBJECTID="21716952"
     * OBJECTGUID="1dad4eff-59a8-4041-acac-04d6ed02f465"
     * CHANGEID="33904555"
     * NUMBER="352"
     * OPERTYPEID="10"
     * PREVID="0"
     * NEXTID="0"
     * STARTDATE="2019-09-12"
     * ENDDATE="2079-06-06"
     * UPDATEDATE="2019-09-12"
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
        'PREVID' => [
            'name' => 'prev_id',
            'value' => [
                'type' => 'string',
                'nullable' => true,
            ]
        ],
        'NEXTID' => [
            'name' => 'next_id',
            'value' => [
                'type' => 'string',
                'nullable' => true,
            ]
        ],
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
        'UPDATEDATE' => 'update_date',
        'ISACTIVE' => 'is_active',
        'ISACTUAL' => 'is_actual',
    ];
}
