<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class AddhouseTypesFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'HOUSETYPE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <HOUSETYPE ID="1" NAME="Корпус" SHORTNAME="к." DESC="Корпус" STARTDATE="2015-12-25" ENDDATE="2079-06-06" UPDATEDATE="2015-12-25" ISACTIVE="true" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
