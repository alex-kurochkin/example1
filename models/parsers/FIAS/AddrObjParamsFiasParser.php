<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class AddrObjParamsFiasParser extends FiasParser
{

    protected string $elementName = 'PARAM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <PARAM ID="1" TYPEID="1" VALUE="0105" OBJECTID="18" CHANGEID="18" UPDATEDATE="2018-09-18" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
