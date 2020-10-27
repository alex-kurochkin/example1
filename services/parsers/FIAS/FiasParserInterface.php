<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS;

use stdClass;

interface FiasParserInterface
{
    public function parse(): ?\Generator;
    public function checkIsActive(stdClass $element): bool;
    public function trim(stdClass $element): stdClass;
}
