<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class AdmHierarchyFiasParser extends FiasParser
{

    protected string $elementName = 'ITEM';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {

            /** <ITEM ID="1879825"
             * OBJECTID="67371563"
             * CHANGEID="100443892"
             * PARENTOBJID="1285"
             * STARTDATE="1900-01-01"
             * ENDDATE="2079-06-06"
             * UPDATEDATE="1900-01-01"
             * ISACTIVE="1"
             * REGIONCODE="1" />
             */

            $attr = $element->attributes();

            print((string)$attr->ID);
            print PHP_EOL;
        }
    }
}
