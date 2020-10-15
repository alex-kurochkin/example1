<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class NormativeDocsKindsFiasParser extends FiasParser
{

    protected string $elementName = 'NDOCKIND';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <NDOCKIND ID="0" NAME="Не определено" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
