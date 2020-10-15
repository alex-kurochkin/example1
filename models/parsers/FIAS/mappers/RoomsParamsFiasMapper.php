<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class RoomsParamsFiasMapper extends AbstractFiasMapper
{

    /** <PARAM ID="22836048" TYPEID="5" VALUE="453203" OBJECTID="1489823" CHANGEID="4107088" UPDATEDATE="2019-03-03" /> */

    protected array $map = [
        'ID' => 'id',
        'TYPEID' => 'type_id',
        'VALUE' => 'value',
        'OBJECTID' => 'object_id',
        'CHANGEID' => 'change_id',
        'UPDATEDATE' => 'update_date',
    ];
}
