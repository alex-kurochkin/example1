<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class OperationTypesFiasMapper extends AbstractFiasMapper
{

    /** <OPERATIONTYPE ID="0" NAME="Не определено" STARTDATE="1900-01-01" ENDDATE="2079-06-06" UPDATEDATE="1900-01-01" ISACTIVE="true" /> */

    protected array $map = [
        'ID' => 'id',
        'NAME' => 'name',
        'STARTDATE' => 'start_date',
        'ENDDATE' => 'end_date',
        'UPDATEDATE' => 'update_date',
        'ISACTIVE' => 'is_active',
    ];
}
