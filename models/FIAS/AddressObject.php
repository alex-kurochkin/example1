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
    ];

    protected string $id;
    protected string $objectId;
    protected string $objectGuid;
    protected string $changeId;
    protected string $name;
    protected string $typeName;
    protected string $level;

    private string $fullName;

    /**
     * Ids from address_object_types DB table which represent selection
     * of some different types of localities.
     * @var int[]
     */
    private array $localityTypeIds = [
        6, 7, 8, 21, 22, 25, 26, 27, 28,
        29, 30, 31, 33, 35, 36, 37, 39, 40, 41,
        46, 49, 50, 51, 52, 53, 54, 55, 73, 76,
        80, 81, 82, 84, 87, 88, 90, 91, 94, 95,
        96, 97, 98, 99, 102, 103, 104, 105, 106,
        107, 108, 109, 111, 112, 123, 125, 134, 147, 156,
        158, 161, 170, 187, 197, 209, 241, 243, 244, 249,
        251, 258, 269, 281, 295, 302, 329, 331, 344, 346,
        347, 352, 353, 355, 363, 373, 377, 379, 382, 389,
        398, 401, 404, 412, 418, 419, 423,
    ];

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
     * @param string $name
     * @param int $regionCode
     * @return self[]
     * @throws FiasModelException
     */
    public function findLocality(string $name, int $regionCode): array
    {
        /** Probably it's good idea to move it to Repository abstract level */
        $query = (new Query())
            ->select('ao.*')
            ->from(['ao' => self::tableName()])
            ->where(['like', 'ao.name', $name . '%', false]);

        $query->join('INNER JOIN', ['aot' => AddressObjectType::tableName()], 'ao.type_name = aot.short_name')
            ->andWhere(['in', 'aot.id', $this->localityTypeIds])
            ->andWhere('ao.level = aot.level');

        if ($regionCode) {
            $query->join('INNER JOIN', ['ah' => AdministrativeHierarchy::tableName()], 'ao.object_id = ah.object_id');
            $query->andWhere(['ah.region_code' => $regionCode]);
        }

        $localities = $query->all();

        try {
            return $this->mapToModelArray($localities);
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
