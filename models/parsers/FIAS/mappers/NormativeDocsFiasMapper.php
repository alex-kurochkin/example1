<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class NormativeDocsFiasMapper extends AbstractFiasMapper
{

    protected array $map = [
        'ID' => 'id',
        'NAME' => 'name',
        'NUMBER' => 'number',
        'DATE' => 'date',
        'TYPE' => 'type',
        'KIND' => 'kind',
        'UPDATEDATE' => 'update_date',
        'ORGNAME' => 'org_name', // government agency
        'REGNUM' => 'reg_num',
        'REGDATE' => 'reg_date',
        'ACCDATE' => 'acc_date', // Date of entry into force of the regulatory document
        'COMMENT' => 'comment',
    ];
}
