<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class CarplacesFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'CARPLACE';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <CARPLACE
             * ID="12182167"
             * OBJECTID="21716952"
             * OBJECTGUID="1dad4eff-59a8-4041-acac-04d6ed02f465"
             * CHANGEID="33904555"
             * NUMBER="352"
             * OPERTYPEID="10"
             * PREVID="0"
             * NEXTID="0"
             * STARTDATE="2019-09-12"
             * ENDDATE="2079-06-06"
             * UPDATEDATE="2019-09-12"
             * ISACTIVE="1"
             * ISACTUAL="1" />
             */

            print($element->id);
            print PHP_EOL;
        }
    }
}
