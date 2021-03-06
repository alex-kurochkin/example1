<?php

declare(strict_types=1);

namespace app\models\FIAS;

use yii\db\Query;

class AdministrativeHierarchy extends AbstractFiasModel
{

    protected array $map = [
        'id' => 'id',
        'objectId' => 'object_id',
        'changeId' => 'change_id',
        'parentObjectId' => 'parent_object_id',
        'regionCode' => 'region_code',
        'areaCode' => 'area_code',
        'cityCode' => 'city_code',
        'placeCode' => 'place_code',
        'planCode' => 'plan_code',
        'streetCode' => 'street_code',
    ];

    protected string $id;
    protected string $objectId;
    protected string $changeId;
    protected string $parentObjectId;
    protected string $regionCode;
    protected string $areaCode;
    protected string $cityCode;
    protected string $placeCode;
    protected string $planCode;
    protected string $streetCode;

    public static function tableName(): string
    {
        return 'administrative_hierarchy';
    }

    public function findParentObjectId($objectId): string
    {
        /** Probably it's good idea to move it to Repository abstract level */
        $next = (new Query())
            ->from(self::tableName())
            ->where(['object_id' => $objectId])
            ->one();

        if (!$next) {
            return '';
        }

        if (array_key_exists('parent_object_id', $next) && $next['parent_object_id']) {
            return $next['parent_object_id'];
        }

        return '';
    }
}
