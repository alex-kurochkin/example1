<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class OperationTypesFiasParser extends FiasParser
{

    protected string $elementName = 'OPERATIONTYPE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {

            /** <OPERATIONTYPE ID="0" NAME="Не определено" STARTDATE="1900-01-01" ENDDATE="2079-06-06" UPDATEDATE="1900-01-01" ISACTIVE="true" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
