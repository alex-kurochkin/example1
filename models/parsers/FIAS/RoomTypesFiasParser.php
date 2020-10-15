<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class RoomTypesFiasParser extends FiasParser
{

    protected string $elementName = 'ROOMTYPE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {

            /** <ROOMTYPE ID="0" NAME="Не определено" DESC="Не определено" STARTDATE="1900-01-01" ENDDATE="2015-11-05" UPDATEDATE="2011-01-01" ISACTIVE="true" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
