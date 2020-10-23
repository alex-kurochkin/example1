<?php

declare(strict_types=1);

namespace app\models\FIAS;

use app\exceptions\FIAS\FiasModelException;

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
        return 'AddressObjects';
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
     * @return array
     * @throws FiasModelException
     */
    public function findCity(string $cityName): array
    {
        /** Probably it's good idea to move it to Repository abstract level */
        $cities = $this->query
            ->from(self::tableName())
            ->where(['like', 'name', $cityName . '%', false])
            ->andWhere(['in', 'type_name', ['г', 'г.', 'с/п', 'с/с', 'пгт']])
            ->andWhere(['level' => 5])
            ->andWhere(['is_active' => 1])
            ->andWhere(['is_actual' => 1])
            ->all();

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
        $object = $this->query
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
