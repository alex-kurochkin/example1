<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class SteadsFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'STEAD';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <STEAD
             * ID="8798839"
             * OBJECTID="93332272"
             * OBJECTGUID="7afb5d47-81f3-4da4-876d-818cbc19925c"
             * CHANGEID="136213878"
             * NUMBER="29"
             * OPERTYPEID="10"
             * NEXTID="0"
             * STARTDATE="2019-09-13"
             * ENDDATE="2079-06-06"
             * UPDATEDATE="2019-09-17"
             * ISACTIVE="1"
             * ISACTUAL="1" />
             */

            print($element->id);
            print PHP_EOL;
        }
    }
}
