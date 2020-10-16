<?php

declare(strict_types=1);

namespace app\models\FIAS;

use DateTime;

class AddressObjects extends AbstractFiasModel
{

    protected string $tableName = 'AddressObjects';

    protected array $map = [
        'id' => 'id',
        'objectId' => 'object_id',
        'objectGuid' => 'object_guid',
        'changeId' => 'change_id',
        'name' => 'name',
        'typeName' => 'type_name',
        'level' => 'level',
        'operationTypeId' => 'operation_type_id',
        'prevId' => 'prev_id',
        'nextId' => 'next_id',
        'startDate' => 'start_date',
        'endDate' => 'end_date',
        'updateDate' => 'update_date',
        'isActive' => 'is_active',
        'isActual' => 'is_actual',
    ];

    protected int $id;
    protected int $objectId;
    protected int $objectGuid;
    protected int $changeId;
    protected string $name;
    protected string $typeName;
    protected int $level;
    protected int $operationTypeId;
    protected int $prevId;
    protected int $nextId;
    protected DateTime $startDate;
    protected DateTime $endDate;
    protected DateTime $updateDate;
    protected bool $isActive;
    protected bool $isActual;
}
