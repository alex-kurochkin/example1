<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class MunHierarchyFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'ITEM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <ITEM ID="49785" OBJECTID="5512" CHANGEID="17231" PARENTOBJID="95231301" STARTDATE="1900-01-01" ENDDATE="2079-06-06" UPDATEDATE="1900-01-01" ISACTIVE="1" OKTMO="80727000121" /> */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
