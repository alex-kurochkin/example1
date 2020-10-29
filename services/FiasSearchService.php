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
     * @param string $name
     * @param int $regionCode
     * @return array
     * @throws FiasSearchServiceException
     */
    public function searchLocalities(string $name, int $regionCode): array
    {
        try {
            $localities = $this->addressObject->findLocality($name, $regionCode);
        } catch (FiasModelException $e) {
            throw new FiasSearchServiceException(__METHOD__ . ' can not find locality: ' . $e->getMessage());
        }

        if (!$localities) {
            return [];
        }

        $result = [];

        /** @var AddressObject $locality */
        foreach ($localities as $locality) {
            $locality->setFullName($locality->getTypeName() . ' ' . $locality->getName());

            if (1 === $locality->getLevel()) {
                $result[] = $locality;
                continue;
            }

            if ($parentName = $this->resolveFullName($locality)) {
                $locality->setFullName($parentName . ' ' . $locality->getTypeName() . ' ' . $locality->getName());
            }

            $result[] = $locality;
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
