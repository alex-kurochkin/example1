<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class HousesFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'HOUSE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <HOUSE
             * ID="2911"
             * OBJECTID="1465592"
             * OBJECTGUID="92158079-3e75-47f5-af2b-0680dce54faa"
             * CHANGEID="4068858"
             * HOUSENUM="3"
             * HOUSETYPE="2"
             * OPERTYPEID="10"
             * PREVID="0"
             * NEXTID="2913"
             * STARTDATE="1900-01-01"
             * ENDDATE="2013-01-01"
             * UPDATEDATE="2012-03-13"
             * ISACTIVE="0"
             * ISACTUAL="0" />
             */

            print($element->id);
            print PHP_EOL;
        }
    }
}
