<?php

declare(strict_types=1);

namespace app\models\FIAS;

use app\exceptions\FIAS\FiasModelException;
use Exception;
use RuntimeException;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

abstract class AbstractFiasModel extends /*Model*/ ActiveRecord
{

    protected array $map;

    public static function getModel(string $name): self
    {
        $c = __NAMESPACE__ . '\\' . $name;

        if (!class_exists($c)) {
            throw new RuntimeException('No such model found: ' . $c);
        }

        return new $c();
    }

    /**
     * @param array $records
     * @return int
     * @throws FiasModelException
     */
    public function saveMany(array $records): int
    {
        if (!count($records)) {
            return 0;
        }

        $columns = array_values($this->map);

        try {
            return Yii::$app->db->createCommand()
                ->batchInsert(
                    static::tableName(),
                    $columns,
                    $records
                )
                ->execute();
        } catch (Exception $e) {
            throw new FiasModelException('FIAS model can not load bulk data: ' . $e->getMessage());
        }
    }
}
