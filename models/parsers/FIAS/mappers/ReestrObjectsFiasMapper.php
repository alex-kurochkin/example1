<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class ReestrObjectsFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'OBJECTID' => 'object_id',
        'OBJECTGUID' => 'object_guid',
        'CHANGEID' => 'change_id',
        'LEVELID' => 'level_id',
        'ISACTIVE' => 'is_active',
        'CREATEDATE' => 'create_date',
        'UPDATEDATE' => 'update_date',
    ];
}
