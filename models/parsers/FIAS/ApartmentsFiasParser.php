<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class ApartmentsFiasParser extends FiasParser
{

    protected string $elName = 'APARTMENT';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {

            /** <APARTMENT ID="13508747"
             * OBJECTID="23890287"
             * OBJECTGUID="f102626c-5427-4051-aca8-5f674e28e3a5"
             * CHANGEID="37083410"
             * NUMBER="93"
             * APARTTYPE="2"
             * OPERTYPEID="10"
             * PREVID="0" NEXTID="0"
             * STARTDATE="2017-04-07"
             * ENDDATE="2079-06-06"
             * UPDATEDATE="2017-04-07"
             * ISACTIVE="1"
             * ISACTUAL="1" />
             */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
