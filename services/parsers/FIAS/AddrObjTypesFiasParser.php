<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS;

use stdClass;

class AddrObjTypesFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'ADDRESSOBJECTTYPE';

    public function checkIsActive(stdClass $element): bool
    {
        return $element->is_active;
    }

    public function trim(stdClass $element): stdClass
    {
        unset($element->is_active);
        return $element;
    }
}
