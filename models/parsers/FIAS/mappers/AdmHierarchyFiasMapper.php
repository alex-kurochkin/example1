<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class AdmHierarchyFiasMapper extends AbstractFiasMapper
{

    /** <ITEM
     * ID="1879825"
     * OBJECTID="67371563"
     * CHANGEID="100443892"
     * PARENTOBJID="1285"
     * STARTDATE="1900-01-01"
     * ENDDATE="2079-06-06"
     * UPDATEDATE="1900-01-01"
     * ISACTIVE="1"
     * REGIONCODE="1" />
     */

    protected array $map = [
        'ID' => 'id',
        'OBJECTID' => 'object_id',
        'CHANGEID' => 'change_id',
        'PARENTOBJID' => 'parent_object_id',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
        'UPDATEDATE' => 'update_date',
        'ISACTIVE' => 'is_active',
        'REGIONCODE' => 'region_code',
    ];
}
