<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class ApartmentsParamsFiasMapper extends AbstractFiasMapper
{

    /** <PARAM ID="23023523" TYPEID="5" VALUE="385130" OBJECTID="1521782" CHANGEID="4155266" UPDATEDATE="2017-11-14" /> */

    protected array $map = [
        'ID' => 'id',
        'TYPEID' => 'type_id',
        'VALUE' => 'value',
        'OBJECTID' => 'object_id',
        'CHANGEID' => 'change_id',
        'UPDATEDATE' => 'update_date',
    ];
}
