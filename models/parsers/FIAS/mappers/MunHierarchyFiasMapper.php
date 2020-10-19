<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class MunHierarchyFiasMapper extends AbstractFiasMapper
{

    /** <ITEM ID="49785" OBJECTID="5512" CHANGEID="17231" PARENTOBJID="95231301" STARTDATE="1900-01-01" ENDDATE="2079-06-06" UPDATEDATE="1900-01-01" ISACTIVE="1" OKTMO="80727000121" /> */

    protected array $map = [
        'ID' => 'id',
        'OBJECTID' => 'object_id',
        'CHANGEID' => 'change_id',
        'PARENTOBJID' => 'parent_object_id',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
        'UPDATEDATE' => 'update_date',
        'ISACTIVE' => 'is_active',
        'OKTMO' => 'oktmo',
        'PREVID' => 'prev_id',
        'NEXTID' => 'next_id',
    ];
}
