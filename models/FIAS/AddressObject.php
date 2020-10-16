<?php

declare(strict_types=1);

namespace app\models\FIAS;

use DateTime;

class AddressObject extends AbstractFiasModel
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

    protected string $id;
    protected string $objectId;
    protected string $objectGuid;
    protected string $changeId;
    protected string $name;
    protected string $typeName;
    protected string $level;
    protected string $operationTypeId;
    protected string $prevId;
    protected string $nextId;
    protected DateTime $startDate;
    protected DateTime $endDate;
    protected DateTime $updateDate;
    protected bool $isActive;
    protected bool $isActual;
}
