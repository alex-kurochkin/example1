<?php

declare(strict_types=1);

namespace app\models\FIAS;

class AddressObject extends AbstractFiasModel
{

    /*  This constants represent values from ObjectLevels
        1	Субъект РФ
        2	Административный район
        3	Муниципальный район
        4	Сельское/городское поселение
        5	Город
        6	Населенный пункт
        7	Элемент планировочной структуры
        8	Элемент улично-дорожной сети
        9	Земельный участок
        10	Здание (сооружение)
        11	Помещение
        12	Помещения в пределах помещения
        13	Уровень автономного округа (устаревшее)
        14	Уровень внутригородской территории (устаревшее)
        15	Уровень дополнительных территорий (устаревшее)
        16	Уровень объектов на дополнительных территориях (устаревшее)
        17	Машино-место
    */

    // current
    public const SUBJECT_RF_LEVEL = 1;
    public const ADMINISTRATIVE_REGION_LEVEL = 2;
    public const MUNICIPAL_DISTRICT_LEVEL = 3;
    public const URBAN_RURAL_SETTLEMENTS_LEVEL = 4;
    public const CITY_LEVEL = 5;
    public const LOCALITY_LEVEL = 6;
    public const PLANNING_STRUCTURE_LEVEL = 7;
    public const ROAD_NETWORK_LEVEL = 8;
    public const LAND_PLOT_LEVEL = 9;
    public const HOUSE_LEVEL = 10; // Building as structure
    public const ROOM_LEVEL = 11;
    public const ROOM_IN_ROOM_LEVEL = 12;
    // obsolete
    public const AUTONOMOUS_OKRUG_LEVEL = 13;
    public const INTRACITY_LEVEL = 14;
    public const ADDITIONAL_TERRITORIES_LEVEL = 15;
    public const ADDITIONAL_TERRITORIES_OBJECT_LEVEL = 16;
    public const PARKING_LEVEL = 17;

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
