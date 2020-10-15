<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class HouseTypesFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'HOUSETYPE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <HOUSETYPE ID="1" NAME="Владение" SHORTNAME="влд." DESC="Владение" STARTDATE="1900-01-01" ENDDATE="2015-11-05" UPDATEDATE="1900-01-01" ISACTIVE="false" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
