<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class CarplacesParamsFiasMapper extends AbstractFiasMapper
{

    /** <PARAM ID="133240963" TYPEID="5" VALUE="450105" OBJECTID="21716952" CHANGEID="33904555" UPDATEDATE="2019-09-12" /> */

    protected array $map = [
        'ID' => 'id',
        'TYPEID' => 'type_id',
        'VALUE' => 'value',
        'OBJECTID' => 'object_id',
        'CHANGEID' => 'change_id',
        'UPDATEDATE' => 'update_date',
    ];
}
