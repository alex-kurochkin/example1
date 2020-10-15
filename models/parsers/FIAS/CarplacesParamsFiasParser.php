<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class CarplacesParamsFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'PARAM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <PARAM ID="133240963" TYPEID="5" VALUE="450105" OBJECTID="21716952" CHANGEID="33904555" UPDATEDATE="2019-09-12" /> */

            print($element->id);
            print PHP_EOL;
        }
    }
}
