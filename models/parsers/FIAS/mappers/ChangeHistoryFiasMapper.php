<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class ChangeHistoryFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'CHANGEID' => 'change_id',
        'OBJECTID' => 'object_id',
        'ADROBJECTID' => 'address_object_id',
        'OPERTYPEID' => 'operation_type_id',
        'CHANGEDATE' => 'change_date',
    ];
}
