<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class ParamTypesFiasParser extends FiasParser
{

    protected string $elementName = 'PARAMTYPE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {

            /** <PARAMTYPE ID="1" NAME="ИФНС ФЛ" DESC="ИФНС ФЛ" CODE="IFNSFL" STARTDATE="2011-11-01" ENDDATE="2079-06-06" UPDATEDATE="2018-06-15" ISACTIVE="true" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
