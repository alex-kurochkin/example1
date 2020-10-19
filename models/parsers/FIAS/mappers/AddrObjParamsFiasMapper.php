<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class AddrObjParamsFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => 'id',
        'TYPEID' => 'type_id',
        'VALUE' => 'value',
        'OBJECTID' => 'object_id',
        'CHANGEID' => 'change_id',
        'UPDATEDATE' => 'update_date',
    ];
}
