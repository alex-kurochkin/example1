<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class AddrObjDivisionFiasParser extends FiasParser
{

    protected string $elName = 'ITEM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {

            /** <ITEM ID="1" PARENTID="1811" CHILDID="1887" CHANGEID="4870" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
