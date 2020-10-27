<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS;

use stdClass;

class AddrObjFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'OBJECT';

    public function checkIsActive(stdClass $element): bool
    {
        return $element->is_active && $element->is_actual;
    }

    public function trim(stdClass $element): stdClass
    {
        unset($element->is_active, $element->is_actual);
        return $element;
    }
}
