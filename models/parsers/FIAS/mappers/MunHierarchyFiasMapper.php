<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class MunHierarchyFiasMapper extends AbstractFiasMapper
{

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
