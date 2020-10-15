<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class AddrObjParamsFiasMapper extends AbstractFiasMapper
{

    /** <PARAM ID="1" TYPEID="1" VALUE="0105" OBJECTID="18" CHANGEID="18" UPDATEDATE="2018-09-18" /> */

    protected array $map = [
        'ID' => 'id',
        'TYPEID' => 'type_id',
        'VALUE' => 'value',
        'OBJECTID' => 'object_id',
        'CHANGEID' => 'change_id',
        'UPDATEDATE' => 'update_date',
    ];
}
