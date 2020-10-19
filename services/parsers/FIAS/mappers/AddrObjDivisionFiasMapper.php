<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class AddrObjDivisionFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => 'id',
        'PARENTID' => 'parent_id',
        'CHILDID' => 'child_id',
        'CHANGEID' => 'change_id',
    ];
}
