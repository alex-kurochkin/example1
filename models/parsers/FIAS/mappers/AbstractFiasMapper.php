<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS\mappers;

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

    private function castValueType(string $value, array $v)
    {
        if (!$value && isset($v['nullable']) && $v['nullable']) {
            return null;
        }

        switch ($v['type']) {
            case 'int':
                return (int)$value;
            case 'float':
                return (float)$value;
            case 'bool':
                return (bool)$value;
        }

        return $value;
    }
}
