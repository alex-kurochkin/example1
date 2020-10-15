<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class ChangeHistoryFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'ITEM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <ITEM CHANGEID="17231" OBJECTID="5512" ADROBJECTID="2e340ef3-52ba-40a8-bd7e-633dbc75ff1c" OPERTYPEID="1" CHANGEDATE="2017-11-16" /> */

            $attr = $element->attributes();

            print((string)$attr->CHANGEID);
            print PHP_EOL;
        }
    }
}
