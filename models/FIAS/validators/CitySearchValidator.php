<?php

declare(strict_types=1);

namespace app\models\FIAS\validators;

use yii\base\Model;

class CitySearchValidator extends Model
{

    public string $city;
    public ?int $regionCode = null;

    public function rules(): array
    {
        return [
            [['city'], 'required'],
            ['city', 'string', 'length' => [1, 250]],
            ['regionCode', 'integer', 'min' => 1, 'max' => 99],
        ];
    }
}
