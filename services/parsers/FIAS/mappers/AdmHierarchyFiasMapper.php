<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class AdmHierarchyFiasMapper extends AbstractFiasMapper
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
        'REGIONCODE' => 'region_code',
        'AREACODE' => 'area_code',
        'CITYCODE' => 'city_code',
        'PLACECODE' => 'place_code',
        'PLANCODE' => 'plan_code',
        'STREETCODE' => 'street_code',
        'PREVID' => 'prev_id',
        'NEXTID' => 'next_id',
    ];
}
