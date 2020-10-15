<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class OperationTypesFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'OPERATIONTYPE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <OPERATIONTYPE ID="0" NAME="Не определено" STARTDATE="1900-01-01" ENDDATE="2079-06-06" UPDATEDATE="1900-01-01" ISACTIVE="true" /> */

            print($element->id);
            print PHP_EOL;
        }
    }
}
