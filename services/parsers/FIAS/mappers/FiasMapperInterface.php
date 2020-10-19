<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS\mappers;

use SimpleXMLElement;
use stdClass;

interface FiasMapperInterface
{
    public function fromFias(SimpleXMLElement $record): stdClass;
}
