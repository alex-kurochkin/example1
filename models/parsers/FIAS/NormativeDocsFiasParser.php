<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class NormativeDocsFiasParser extends FiasParser
{

    protected string $elementName = 'NORMDOC';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {

            /** <NORMDOC ID="137" NAME="Постановление" NUMBER="22" DATE="2017-02-09" TYPE="7" KIND="1" UPDATEDATE="2017-12-18" />
             */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
