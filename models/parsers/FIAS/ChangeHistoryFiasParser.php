<?php

declare(strict_types=1);

namespace app\models\parsers\FIAS;


class ChangeHistoryFiasParser extends AbstractFiasParser
{

    protected string $elementName = 'ITEM';
}
