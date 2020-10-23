<?php

declare(strict_types=1);

namespace app\services;

use app\models\FIAS\AddressObject;
use app\models\FIAS\AdministrativeHierarchy;

class FiasSearchService
{

    private AddressObject $addressObject;
    private AdministrativeHierarchy $hierarchy;

    public function __construct(AddressObject $addressObject, AdministrativeHierarchy $hierarchy)
    {
        $this->addressObject = $addressObject;
        $this->hierarchy = $hierarchy;
    }

    public function searchCities(string $cityName): array
    {
        $cities = $this->addressObject->findCity($cityName);

        if (!$cities) {
            return [];
        }

        $result = [];

        /** @var AddressObject $city */
        foreach ($cities as $city) {
            $city->setFullName($city->getTypeName() . ' ' . $city->getName());

            if (1 === $city->getLevel()) {
                $result[] = $city;
                continue;
            }

            if ($parentName = $this->resolveFullName($city)) {
                $city->setFullName($parentName . ' ' . $city->getTypeName() . ' ' . $city->getName());
            }

            $result[] = $city;
        }

        return $result;
    }

    private function resolveFullName(AddressObject $daughterObject): string
    {
        $fullNameParts = [];
        while (true) {
            $parentObjectId = $this->hierarchy->findParentObjectId($daughterObject->getObjectId());

            if (!$parentObjectId) {
                /** not found or parent_object_id is 1 */
                break;
            }

            /** @var AddressObject $parentObject */
            $parentObject = $this->addressObject->findByObjectId($parentObjectId);

            $fullNameParts[] = $parentObject->getName() . ' ' . $parentObject->getTypeName() . ',';

            $daughterObject = $parentObject;
        }

        return implode(' ', array_reverse($fullNameParts));
    }
}
