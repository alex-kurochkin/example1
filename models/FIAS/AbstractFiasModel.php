<?php

declare(strict_types=1);

namespace app\models\FIAS;

use app\exceptions\FIAS\FiasModelException;
use Exception;
use RuntimeException;
use Yii;
use yii\base\Model;
use yii\db\Connection;

abstract class AbstractFiasModel extends Model
{

    protected array $map;
    protected array $mapToModel;

    private string $insertValues = '';
    private Connection $connection;

    public function __construct($config = [])
    {
        /** For self::mapToModelOne() which called repeatedly */
        $this->mapToModel = array_flip($this->map);
        $this->connection = Yii::$app->getDb(); // Optimization

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

    public function collect(\stdClass $record): void
    {
        /** This code violate the architecture for the sake of optimization. */
        $pdo = $this->connection->getSlavePdo();

        foreach ($record as $k => &$value) {

            if (!is_string($value)) {

                if (is_null($value)) {
                    $value = 'NULL';
                }

                continue;
            }

            $value = $pdo->quote($value);
        }
        unset($value);

        $this->insertValues .= '(' . implode(',', (array)$record) . '),';
    }

    /**
     * @return int
     * @throws FiasModelException
     */
    public function saveMany(): int
    {
        /** This code violate the architecture for the sake of optimization. */
        if (!$this->insertValues) {
            return 0;
        }

        $columns = array_values($this->map);
        foreach ($columns as &$column) {
            $column = '`' . $column . '`';
        }
        unset($column);

        $insert = 'INSERT INTO `' . static::tableName() . '` (' . implode(',', $columns) . ') VALUES ';
        $insert .= substr($this->insertValues, 0, -1);

        $this->insertValues = '';

        try {
            $command = $this->connection->createCommand($insert);

            $dataReader = $command->query();
            return $dataReader->count();
        } catch (Exception $e) {
            throw new FiasModelException('FIAS model can not load bulk data: ' . $e->getMessage());
        }
    }

    public function toArray(array $fields = [], array $expand = [], $recursive = true): array
    {
        $arrayInstance = [];

        $thisFields = array_keys($this->map);

        foreach ($thisFields as $field) {
            $value = $this->$field;

            if ($value instanceof \DateTimeInterface) {
                $value = $value->format('c');
            }

            $arrayInstance[$field] = $value;
        }

        return $arrayInstance;
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
            $models[] = $this->mapToModelOne($item);
        }

        return $models;
    }

    /**
     * @param array $item
     * @return $this
     * @throws Exception
     */
    protected function mapToModelOne(array $item): self
    {
        $model = clone($this);

        foreach ($item as $field => $value) {
            if (array_key_exists($field, $this->mapToModel)) {
                $modelFieldName = $this->mapToModel[$field];

                if (false !== strpos($modelFieldName, "Date")) {
                    $value = new \DateTimeImmutable($value);
                }

                $model->$modelFieldName = $value;
            }
        }

        return $model;
    }
}
