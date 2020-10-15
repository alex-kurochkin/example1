<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class NormativeDocsKindsFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'NDOCKIND';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <NDOCKIND ID="0" NAME="Не определено" /> */

            print($element->id);
            print PHP_EOL;
        }
    }
}
