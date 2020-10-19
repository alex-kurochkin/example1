<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;


class NormativeDocsFiasMapper extends AbstractFiasMapper
{

    /** <NORMDOC ID="137" NAME="Постановление" NUMBER="22" DATE="2017-02-09" TYPE="7" KIND="1" UPDATEDATE="2017-12-18" /> */

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
