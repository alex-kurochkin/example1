<?php

declare(strict_types=1);

namespace app\models\FIAS\validators;

use yii\base\Model;

class CitySearchValidator extends Model
{

    public string $city = '';

    public function rules(): array
    {
        return [
            [['city'], 'required'],
            ['city', 'string', 'length' => [1, 250]],
        ];
    }
}
