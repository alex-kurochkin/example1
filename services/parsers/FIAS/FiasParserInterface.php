<?php

declare(strict_types=1);

namespace app\services\parsers\FIAS;

interface FiasParserInterface
{
    public function parse(): ?\Generator;
}
