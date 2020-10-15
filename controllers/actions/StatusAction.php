<?php

declare(strict_types=1);

namespace app\controllers\actions;

use yii\base\Action;

class StatusAction extends Action
{

    public function run(): string
    {
        return 'ok';
    }
}
