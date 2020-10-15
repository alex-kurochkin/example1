<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class NormativeDocsTypesFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'NDOCTYPE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <NDOCTYPE ID="0" NAME="Не указан" STARTDATE="1900-01-01" ENDDATE="2016-03-31" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
