<?php

declare(strict_types=1);

namespace app\controllers;

use app\controllers\actions\SearchAction;
use app\controllers\actions\StatusAction;
use yii\base\Controller;

class ApiController extends Controller
{

    public function actions(): array
    {
        return [
            'status' => StatusAction::class,
            'search' => SearchAction::class,
        ];
    }
}
