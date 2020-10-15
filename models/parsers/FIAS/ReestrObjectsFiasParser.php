<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class ReestrObjectsFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'OBJECT';

    public function parse(): void
    {
        foreach ($this->parseXML() as $element) {
            /** <OBJECT
             * OBJECTID="97919461"
             * OBJECTGUID="3b14dab0-4e15-48c9-bcbd-1fc9d34fe849"
             * CHANGEID="155702057"
             * LEVELID="10"
             * ISACTIVE="1"
             * CREATEDATE="2020-08-17"
             * UPDATEDATE="2020-08-17" />
             */

            print($element->object_id);
            print PHP_EOL;
        }
    }
}
