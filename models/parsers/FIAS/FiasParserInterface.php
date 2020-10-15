<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;

interface FiasParserInterface
{
    public function parse(): void;
}
