<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class ChangeHistoryFiasMapper extends AbstractFiasMapper
{

    /** <ITEM CHANGEID="17231" OBJECTID="5512" ADROBJECTID="2e340ef3-52ba-40a8-bd7e-633dbc75ff1c" OPERTYPEID="1" CHANGEDATE="2017-11-16" /> */

    protected array $map = [
        'CHANGEID' => 'change_id',
        'OBJECTID' => 'object_id',
        'ADROBJECTID' => 'address_object_id',
        'OPERTYPEID' => 'operation_type_id',
        'CHANGEDATE' => 'change_date',
    ];
}
