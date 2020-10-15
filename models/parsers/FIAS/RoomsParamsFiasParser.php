<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class RoomsParamsFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'PARAM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <PARAM ID="22836048" TYPEID="5" VALUE="453203" OBJECTID="1489823" CHANGEID="4107088" UPDATEDATE="2019-03-03" /> */

            print($element->id);
            print PHP_EOL;
        }
    }
}
