<?php

declare(strict_types=1);

namespace app\utils\FIAS;

use InvalidArgumentException;

class FiasFile
{

    public static function parseEntityName(string $filename): string
    {
        preg_match('/^AS_(\w+)_\d{8}_[\w-]+\.XML$/i', $filename, $m);

        if (2 !== count($m)) {
            throw new InvalidArgumentException(__METHOD__ . ' can not parse ' . $filename);
        }

        $name = str_replace('_', ' ', $m[1]);
        $name = ucwords(strtolower($name));

        return str_replace(' ', '', $name);
    }
}
