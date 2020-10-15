<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class ApartmentsParamsFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'PARAM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <PARAM ID="23023523" TYPEID="5" VALUE="385130" OBJECTID="1521782" CHANGEID="4155266" UPDATEDATE="2017-11-14" />
             */

            print($element->id);
            print PHP_EOL;
        }
    }
}
