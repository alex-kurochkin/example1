<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class HousesParamsFiasMapper extends AbstractFiasMapper
{

    /** <PARAM ID="22655872" TYPEID="1" VALUE="5510" OBJECTID="1463962" CHANGEID="4065600" UPDATEDATE="2012-04-02" /> */

    protected array $map = [
        'ID' => 'id',
        'TYPEID' => 'type_id',
        'VALUE' => 'value',
        'OBJECTID' => 'object_id',
        'CHANGEID' => 'change_id',
        'UPDATEDATE' => 'update_date',
    ];
}
