<?php

declare(strict_types=1);

namespace app\controllers;

use app\controllers\actions\SearchAction;
use app\controllers\actions\StatusAction;
use yii\base\Controller;
use yii\web\ErrorAction;

class ApiController extends Controller
{

    public function actions(): array
    {
        return [
            'error' => ErrorAction::class,
            'status' => StatusAction::class,
            'search' => SearchAction::class,

            // declares "view" action using a configuration array
//            'view' => [
//                'class' => 'yii\web\ViewAction',
//                'viewPrefix' => '',
//            ],
        ];
    }
}
