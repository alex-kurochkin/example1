<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class ApartmentTypesFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'APARTMENTTYPE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <APARTMENTTYPE
             * ID="1"
             * NAME="Помещение"
             * SHORTNAME="помещение"
             * DESC="Помещение"
             * STARTDATE="1900-01-01"
             * ENDDATE="2079-06-06"
             * UPDATEDATE="1900-01-01"
             * ISACTIVE="1"/>
             */

            print($element->id);
            print PHP_EOL;
        }
    }
}
