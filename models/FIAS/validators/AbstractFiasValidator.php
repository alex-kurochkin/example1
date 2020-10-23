<?php

declare(strict_types=1);

namespace app\models\FIAS\validators;

use yii\base\Model;

class AbstractFiasValidator extends Model
{

    public function __construct($config = [])
    {
        $this->load($config);
        parent::__construct([]);
    }

    public function load($data, $formName = null)
    {
        foreach ($data as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }
}
