<?php

declare(strict_types=1);

namespace app\models\FIAS\validators;

use yii\base\Model;

class LocalitySearchValidator extends Model
{

    public string $locality;
    public int $regionCode;

    public function rules(): array
    {
        return [
            [['locality'], 'required'],
            ['locality', 'string', 'length' => [1, 250]],
            ['regionCode', 'integer', 'min' => 0, 'max' => 99],
        ];
    }
}
