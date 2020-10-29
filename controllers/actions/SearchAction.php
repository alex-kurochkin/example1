<?php

declare(strict_types=1);

namespace app\controllers\actions;

use app\controllers\ApiController;
use app\models\FIAS\AddressObject;
use app\models\FIAS\validators\LocalitySearchValidator;
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
            $locality = (string)$this->request->get('locality', '');
            $regionCode = (int)$this->request->get('regionCode');

            $validationArray = [
                'locality' => $locality,
                'regionCode' => $regionCode,
            ];

            $validator = new LocalitySearchValidator();
            if (!$validator->load($validationArray, '') || !$validator->validate()) {
                return json_encode($validator->errors, JSON_THROW_ON_ERROR);
            }

            $localities = $this->searchService->searchLocalities($locality, $regionCode);

            $responseArray = [];
            /** @var AddressObject $locality */
            foreach ($localities as $locality) {
                $responseArray[] = $locality->toArray();
            }

            return json_encode($responseArray, JSON_THROW_ON_ERROR);
        } catch (\Throwable $e) {

            $this->logger->log($e->getMessage(), Logger::LEVEL_ERROR);

            if ($e instanceof JsonException) {
                return '"JsonException caught: ' . $e->getMessage() . '"';
            }

            return json_encode($e->getMessage(), JSON_THROW_ON_ERROR);
        }
    }
}
