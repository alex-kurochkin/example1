<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class NormativeDocsKindsFiasMapper extends AbstractFiasMapper
{

    /** <NDOCKIND ID="0" NAME="Не определено" /> */

    protected array $map = [
        'ID' => 'id',
        'NAME' => 'name',
    ];
}
