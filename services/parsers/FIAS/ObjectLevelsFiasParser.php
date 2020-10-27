<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS;

use stdClass;

class ObjectLevelsFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'OBJECTLEVEL';

    public function checkIsActive(stdClass $element): bool
    {
        return $element->is_active;
    }
}
