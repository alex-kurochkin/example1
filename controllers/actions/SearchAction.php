<?php

declare(strict_types=1);

namespace app\controllers\actions;

use app\controllers\ApiController;
use yii\base\Action;
use yii\web\Request;

class SearchAction extends Action
{

    private Request $request;

    public function __construct(string $id, ApiController $controller, Request $request, array $config = [])
    {
        $this->request = $request;
        parent::__construct($id, $controller, $config);
    }

    public function run()
    {
        $getParams = $this->request->get();
        var_dump($getParams);
        return __METHOD__;
    }
}
