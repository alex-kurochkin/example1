<?php

declare(strict_types=1);

namespace app\utils\FIAS;

use InvalidArgumentException;

class FiasFile
{

    public static function parseEntityName(string $filename): string
    {
        /** Archive contain XSD files, but we don't process them. */
        if ('XSD' === substr($filename, -3, 3)) {
            return '';
        }

        /**
         * Fias source files (XML) have an unique part in their names.
         * So we use regexp to extract part of the name indicating the contents of the file.
         * Found string used to:
         *  - search FIAS parser implementation (parsers-namespace + found-string + "FiasParser") in the AbstractFiasParser
         *  - search fias model using array of matches (see: FiasParseService)
         */
        preg_match('/AS_(\w+)_\d{8}_[\w-]+\.XML$/i', $filename, $m);

        if (2 !== count($m)) {
            throw new InvalidArgumentException(__METHOD__ . ' can not parse ' . $filename);
        }

        $name = str_replace('_', ' ', $m[1]);
        $name = ucwords(strtolower($name));

        return str_replace(' ', '', $name);
    }
}
