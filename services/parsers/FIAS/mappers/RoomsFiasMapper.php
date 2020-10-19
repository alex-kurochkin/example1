<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class RoomsFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => 'id',
        'OBJECTID' => 'object_id',
        'OBJECTGUID' => 'object_guid',
        'CHANGEID' => 'change_id',
        'NUMBER' => 'number', // in the docs: ROOMNUMBER
        'ROOMTYPE' => 'room_type',
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
