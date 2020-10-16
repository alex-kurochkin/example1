<?php

declare(strict_types=1);

namespace app\models\FIAS;

use DateTime;

class House extends AbstractFiasModel
{

    protected string $tableName = 'Houses';

    protected array $map = [
        'id' => 'id',
        'objectId' => 'object_id',
        'objectGuid' => 'object_guid',
        'changeId' => 'change_id',
        'houseNumber' => 'house_number',
        'additionalNumber1' => 'additional_number_1',
        'additionalNumber2' => 'additional_number_2',
        'houseType' => 'house_type',
        'additionalType1' => 'additional_type_1',
        'additionalType2' => 'additional_type_2',
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
    protected string $houseNumber;
    protected string $additionalNumber1;
    protected string $additionalNumber2;
    protected int $houseType;
    protected int $additionalType1;
    protected int $additionalType2;
    protected string $operationTypeId;
    protected string $prevId;
    protected string $nextId;
    protected DateTime $startDate;
    protected DateTime $endDate;
    protected DateTime $updateDate;
    protected bool $isActive;
    protected bool $isActual;
}
