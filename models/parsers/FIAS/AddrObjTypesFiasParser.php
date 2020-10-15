<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class AddrObjTypesFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'ADDRESSOBJECTTYPE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <ADDRESSOBJECTTYPE
             * ID="5"
             * LEVEL="1"
             * NAME="Автономная область"
             * SHORTNAME="Аобл"
             * DESC="Автономная область"
             * STARTDATE="1900-01-01"
             * ENDDATE="2015-11-05"
             * UPDATEDATE="1900-01-01"
             * ISACTIVE="true"/>
             */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
