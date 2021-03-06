<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;

use RuntimeException;
use SimpleXMLElement;
use stdClass;

abstract class AbstractFiasMapper implements FiasMapperInterface
{

    protected array $map = [];

    public function fromFias(SimpleXMLElement $record): stdClass
    {
        $attributes = $record->attributes();

        $result = [];
        foreach ($this->map as $sourceFieldName => $rule) {
            $value = (string)$attributes->$sourceFieldName;

            if (is_array($rule)) {
                $fieldName = $rule['name'];
                $value = $this->castValueType($value, $rule['value']);
            } else {
                $fieldName = $rule;
            }

            $result[$fieldName] = $value;
        }

        return (object)$result;
    }

    public static function getMapper($name): self
    {
        $c = __NAMESPACE__ . '\\' . $name . 'FiasMapper';

        if (!class_exists($c)) {
            throw new RuntimeException('No such FIAS mapper found: ' . $c);
        }

        return new $c;
    }

    private function castValueType(string $value, array $type)
    {
        if (!$value && isset($type['nullable']) && $type['nullable']) {
            return null;
        }

        switch ($type['type']) {
            case 'int':
                return (int)$value;
            case 'bool':
                return $this->parseBool($value);
        }

        return $value;
    }

    private function parseBool($value): bool
    {
        if ('true' === $value) {
            return true;
        }

        if ('false' === $value) {
            return false;
        }

        return (bool)$value;
    }
}
