<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class AddrObjDivisionFiasMapper extends AbstractFiasMapper
{

    /** <ITEM ID="1" PARENTID="1811" CHILDID="1887" CHANGEID="4870" /> */

    protected array $map = [
        'ID' => 'id',
        'PARENTID' => 'parent_id',
        'CHILDID' => 'child_id',
        'CHANGEID' => 'change_id',
    ];
}
