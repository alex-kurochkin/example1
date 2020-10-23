<?php

declare(strict_types=1);

namespace app\controllers\actions;

use app\controllers\ApiController;
use app\models\FIAS\AddressObject;
use app\models\FIAS\validators\CitySearchValidator;
use app\services\FiasSearchService;
use Exception;
use JsonException;
use yii\base\Action;
use yii\log\Logger;
use yii\web\Request;

class SearchAction extends Action
{

    private Request $request;

    private FiasSearchService $searchService;

    private Logger $logger;

    public function __construct(
        string $id,
        ApiController $controller,
        Request $request,
        FiasSearchService $searchService,
        Logger $logger,
        array $config = []
    ) {
        $this->request = $request;
        $this->searchService = $searchService;
        $this->logger = $logger;
        parent::__construct($id, $controller, $config);
    }

    public function run()
    {
        try {

            throw new JsonException('JsonException!!!!!!!!!');

            $getParams = $this->request->get();

            $validator = new CitySearchValidator($getParams);
            if (!$validator->validate()) {
                return json_encode($validator->errors, JSON_THROW_ON_ERROR);
            }

            $cities = $this->searchService->searchCities($getParams['city']);

            $responseArray = [];
            /** @var AddressObject $city */
            foreach ($cities as $city) {
                $responseArray[] = $city->toArray();
            }

            return json_encode($responseArray, JSON_THROW_ON_ERROR);
        } catch (Exception $e) {

            $this->logger->log($e->getMessage(), Logger::LEVEL_ERROR);

            if ($e instanceof JsonException) {
                return '"JsonException caught: ' . $e->getMessage() . '"';
            }

            return json_encode($e->getMessage(), JSON_THROW_ON_ERROR);
        }
    }
}
