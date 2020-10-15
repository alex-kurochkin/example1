<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class AddrObjFiasParser extends FiasParser
{

    protected string $elName = 'OBJECT';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {

            /** <OBJECT
             * ID="1182747"
             * OBJECTID="951811"
             * OBJECTGUID="ab823aca-c4b8-4d56-908a-61deb581b274"
             * CHANGEID="2623884"
             * NAME="сдт Фантазия (ЦАО2)"
             * TYPENAME="дп"
             * LEVEL="6"
             * OPERTYPEID="1"
             * PREVID="0"
             * NEXTID="1182799"
             * STARTDATE="1900-01-01"
             * ENDDATE="2019-09-30"
             * UPDATEDATE="2017-10-06"
             * ISACTIVE="0"
             * ISACTUAL="0" />
             */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
