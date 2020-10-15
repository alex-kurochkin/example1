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
        foreach ($this->map as $k => $v) {
            $result[$v] = (string)$attributes->$k;
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
}
