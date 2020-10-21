<?php

declare(strict_types=1);

namespace app\models\FIAS;

class AddressObject extends AbstractFiasModel
{

    public const REGION_LEVEL = 1;
    public const AUTONOMOUS_REGION_LEVEL = 2;
    public const DISTRICT_LEVEL = 3;
    public const URBAN_RURAL_SETTLEMENTS_LEVEL = 35;
    public const CITY_LEVEL = 4;
    public const INTRACITY_LEVEL = 5;
    public const SETTLEMENT_LEVEL = 6;
    public const PLANNING_STRUCTURE_LEVEL = 65;
    public const STREET_LEVEL = 7;
    public const STEAD_LEVEL = 75;
    public const UNFINISHED_CONSTRUCTION_LEVEL = 8;
    public const ROOM_LEVEL = 9;
    public const ADDITIONAL_TERRITORIES_LEVEL = 90;
    public const ADDITIONAL_TERRITORIES_OBJECTS_LEVEL = 91;

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
    protected \DateTime $startDate;
    protected \DateTime $endDate;
    protected \DateTime $updateDate;
    protected bool $isActive;
    protected bool $isActual;

    public static function tableName(): string
    {
        return 'AddressObjects';
    }
}
