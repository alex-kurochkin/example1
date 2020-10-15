<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;

interface IFiasParser
{
    public function parse(): void;
}
