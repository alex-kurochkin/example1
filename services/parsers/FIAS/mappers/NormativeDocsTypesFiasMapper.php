<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;


class NormativeDocsTypesFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => 'id',
        'NAME' => 'name',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
    ];
}
