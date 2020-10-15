<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class SteadsParamsFiasMapper extends AbstractFiasMapper
{

    /** <PARAM ID="470393469" TYPEID="1" VALUE="0261" OBJECTID="84557352" CHANGEID="125536038" UPDATEDATE="2019-12-13" /> */

    protected array $map = [
        'ID' => 'id',
        'TYPEID' => 'type_id',
        'VALUE' => 'value',
        'OBJECTID' => 'object_id',
        'CHANGEID' => 'change_id',
        'UPDATEDATE' => 'update_date',
    ];
}
