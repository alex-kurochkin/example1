<?php

declare(strict_types=1);

namespace app\models\FIAS;

use app\exceptions\FIAS\FiasModelException;
use Exception;
use Yii;
use yii\base\Model;

abstract class AbstractFiasModel extends Model // or ActiveRecord?
{

    protected string $tableName;

    protected array $map;

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
                    $this->tableName,
                    $columns,
                    $records
                )
                ->execute();
        } catch (Exception $e) {
            throw new FiasModelException('FIAS model can not load bulk data: ' . $e->getMessage());
        }
    }
}
