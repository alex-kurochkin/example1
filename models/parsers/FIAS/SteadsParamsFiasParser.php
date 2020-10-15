<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class SteadsParamsFiasParser extends FiasParser
{

    protected string $elementName = 'PARAM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <PARAM ID="470393469" TYPEID="1" VALUE="0261" OBJECTID="84557352" CHANGEID="125536038" UPDATEDATE="2019-12-13" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
