<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class ObjectLevelsFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'OBJECTLEVEL';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <OBJECTLEVEL LEVEL="1" NAME="Субъект РФ" STARTDATE="1900-01-01" ENDDATE="2079-06-06" UPDATEDATE="1900-01-01" ISACTIVE="true" /> */

            print($element->level);
            print PHP_EOL;
        }
    }
}
