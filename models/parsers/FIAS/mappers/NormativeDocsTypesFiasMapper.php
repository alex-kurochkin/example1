<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class NormativeDocsTypesFiasMapper extends AbstractFiasMapper
{

    /** <NDOCTYPE ID="0" NAME="Не указан" STARTDATE="1900-01-01" ENDDATE="2016-03-31" /> */

    protected array $map = [
        'ID' => 'id',
        'NAME' => 'name',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
    ];
}
