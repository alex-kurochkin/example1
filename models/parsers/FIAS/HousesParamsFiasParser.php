<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class HousesParamsFiasParser extends FiasParser
{

    protected string $elementName = 'PARAM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <PARAM ID="22655872" TYPEID="1" VALUE="5510" OBJECTID="1463962" CHANGEID="4065600" UPDATEDATE="2012-04-02" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
