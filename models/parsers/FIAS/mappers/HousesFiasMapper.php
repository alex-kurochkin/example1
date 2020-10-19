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
        'ID' => [
            'name' => 'id',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'OBJECTID' => [
            'name' => 'object_id',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'OBJECTGUID' => 'object_guid',
        'CHANGEID' => [
            'name' => 'change_id',
            'value' => [
                'type' => 'int',
                'nullable' => false,
            ]
        ],
        'HOUSENUM' => 'house_number',
        'ADDNUM1' => [
            'name' => 'additional_number_1',
            'value' => [
                'type' => 'string',
                'nullable' => true,
            ]
        ],
        'ADDNUM2' => [
            'name' => 'additional_number_2',
            'value' => [
                'type' => 'string',
                'nullable' => true,
            ]
        ],
        'HOUSETYPE' => [
            'name' => 'house_type',
            'value' => [
                'type' => 'string',
                'nullable' => true,
            ]
        ],
        'ADDTYPE1' => [
            'name' => 'additional_type_1',
            'value' => [
                'type' => 'int',
                'nullable' => true,
            ]
        ],
        'ADDTYPE2' => [
            'name' => 'additional_type_2',
            'value' => [
                'type' => 'int',
                'nullable' => true,
            ]
        ],
        'OPERTYPEID' => 'operation_type_id',
        'PREVID' => [
            'name' => 'prev_id',
            'value' => [
                'type' => 'int',
                'nullable' => true,
            ]
        ],
        'NEXTID' => [
            'name' => 'next_id',
            'value' => [
                'type' => 'int',
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
