<?php

declare(strict_types=1);

namespace app\models\FIAS;

use app\exceptions\FIAS\FiasModelException;
use yii\db\Query;

class AddressObject extends AbstractFiasModel
{

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
    protected ?string $prevId;
    protected ?string $nextId;
    protected \DateTimeInterface $startDate;
    protected \DateTimeInterface $endDate;
    protected \DateTimeInterface $updateDate;
    protected bool $isActive;
    protected bool $isActual;

    private string $fullName;

    public static function tableName(): string
    {
        return 'address_objects';
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getObjectId(): string
    {
        return $this->objectId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->typeName;
    }

    /**
     * @return string
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function toArray(array $fields = [], array $expand = [], $recursive = true): array
    {
        $arrayInstance = parent::toArray();

        $arrayInstance['fullName'] = $this->fullName;

        return $arrayInstance;
    }

    /**
     * @param string $cityName
     * @param int $regionCode
     * @return array
     * @throws FiasModelException
     */
    public function findCity(string $cityName, int $regionCode): array
    {
        /** Probably it's good idea to move it to Repository abstract level */
        $query = (new Query())
            ->from(['ao' => self::tableName()])
            ->where(['like', 'ao.name', $cityName . '%', false])
            ->andWhere(['in', 'ao.type_name', ['г', 'г.', 'с/п', 'с/с', 'пгт']])
//            ->andWhere(['ao.level' => 5])
            ->andWhere(['ao.is_active' => 1])
            ->andWhere(['ao.is_actual' => 1]);

        if ($regionCode) {
            $query->join('INNER JOIN', ['ah' => AdministrativeHierarchy::tableName()], 'ao.object_id = ah.object_id');
            $query->andWhere(['ah.region_code' => $regionCode]);
        }

        $cities = $query->all();

        try {
            return $this->mapToModelArray($cities);
        } catch (\Exception $e) {
            throw new FiasModelException(
                __METHOD__ . ' Exception caught on array mapping to model: ' . $e->getMessage()
            );
        }
    }

    /**
     * @param string $objectId
     * @return AddressObject
     * @throws FiasModelException
     */
    public function findByObjectId(string $objectId): AddressObject
    {
        $object = (new Query())
            ->from(self::tableName())
            ->where(['object_id' => $objectId])
            ->andWhere(['is_active' => 1])
            ->andWhere(['is_actual' => 1])
            ->one();

        try {
            return $this->mapToModelOne($object);
        } catch (\Exception $e) {
            throw new FiasModelException(
                __METHOD__ . ' Exception caught on array mapping to model: ' . $e->getMessage()
            );
        }
    }
}
