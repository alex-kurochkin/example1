<?php

declare(strict_types=1);

namespace app\models\FIAS;

use app\exceptions\FIAS\FiasModelException;
use Exception;
use RuntimeException;
use Yii;
use yii\base\Model;
use yii\db\Query;

abstract class AbstractFiasModel extends Model
{

    protected array $map;
    protected array $mapToModel;

    protected Query $query;

    public function __construct(Query $query, $config = [])
    {
        $this->query = $query;
        $this->mapToModel = array_flip($this->map);

        parent::__construct($config);
    }

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

    /**
     * 1. Mapping should be move to model mapper abstract level
     * and using from Repository... probably.
     * 2. Expand map array with variable types to prevent wrong type casting based on variable name.
     */

    /**
     * @param array $items
     * @return array
     * @throws Exception
     */
    protected function mapToModelArray(array $items): array
    {
        $models = [];

        foreach ($items as $item) {
            $models[] = $this->mapToModel($item);
        }

        return $models;
    }

    /**
     * @param array $item
     * @return $this
     * @throws Exception
     */
    protected function mapToModel(array $item): self
    {
        $model = clone($this);

        foreach ($item as $field => $value) {
            if (array_key_exists($field, $this->mapToModel))
            {
                $modelFieldName = $this->mapToModel[$field];

                if (false !== strpos($modelFieldName, "Date")) {
                    $value = new \DateTimeImmutable($value);
                }

                if (0 === strpos($modelFieldName, "is")) {
                    $value = (bool)$value;
                }

                $model->$modelFieldName = $value;
            }
        }

        return $model;
    }
}
