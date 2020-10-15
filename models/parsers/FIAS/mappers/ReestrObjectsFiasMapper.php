<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class ReestrObjectsFiasMapper extends AbstractFiasMapper
{

    /** <OBJECT
     * OBJECTID="97919461"
     * OBJECTGUID="3b14dab0-4e15-48c9-bcbd-1fc9d34fe849"
     * CHANGEID="155702057"
     * LEVELID="10"
     * ISACTIVE="1"
     * CREATEDATE="2020-08-17"
     * UPDATEDATE="2020-08-17" />
     */

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
