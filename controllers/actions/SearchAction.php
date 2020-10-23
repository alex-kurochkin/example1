<?php

declare(strict_types=1);

namespace app\controllers\actions;

use app\controllers\ApiController;
use app\exceptions\FIAS\FiasSearchServiceException;
use app\models\FIAS\AddressObject;
use app\models\FIAS\validators\CitySearchValidator;
use app\services\FiasSearchService;
use yii\base\Action;
use yii\web\Request;

class SearchAction extends Action
{

    private Request $request;

    private FiasSearchService $searchService;

    public function __construct(
        string $id,
        ApiController $controller,
        Request $request,
        FiasSearchService $searchService,
        array $config = []
    ) {
        $this->request = $request;
        $this->searchService = $searchService;
        parent::__construct($id, $controller, $config);
    }

    public function run()
    {
        $getParams = $this->request->get();

        $validator = new CitySearchValidator($getParams);
        if (!$validator->validate()) {
            return json_encode($validator->errors, JSON_THROW_ON_ERROR);
        }

        try {
            $cities = $this->searchService->searchCities($getParams['city']);
        } catch (FiasSearchServiceException $e) {
            return json_encode($e->getMessage(), JSON_THROW_ON_ERROR);
        }

        $responseArray = [];
        /** @var AddressObject $city */
        foreach ($cities as $city) {
            $responseArray[] = $city->toArray();
        }

        return json_encode($responseArray, JSON_THROW_ON_ERROR);
    }
}
