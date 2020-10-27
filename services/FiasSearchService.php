<?php

declare(strict_types=1);

namespace app\services;

use app\exceptions\FIAS\FiasModelException;
use app\exceptions\FIAS\FiasSearchServiceException;
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

    /**
     * @param string $cityName
     * @param int $regionCode
     * @return array
     * @throws FiasSearchServiceException
     */
    public function searchCities(string $cityName, int $regionCode): array
    {
        try {
            $cities = $this->addressObject->findCity($cityName, $regionCode);
        } catch (FiasModelException $e) {
            throw new FiasSearchServiceException(__METHOD__ . ' can not find city: ' . $e->getMessage());
        }

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

    /**
     * @param AddressObject $daughterObject
     * @return string
     * @throws FiasSearchServiceException
     */
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
            try {
                $parentObject = $this->addressObject->findByObjectId($parentObjectId);
            } catch (FiasModelException $e) {
                throw new FiasSearchServiceException(__METHOD__ . ' can not resolve full name: ' . $e->getMessage());
            }

            $fullNameParts[] = $parentObject->getName() . ' ' . $parentObject->getTypeName() . ',';

            $daughterObject = $parentObject;
        }

        return implode(' ', array_reverse($fullNameParts));
    }
}
