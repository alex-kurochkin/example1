<?php

use yii\db\Migration;

/**
 * Class m201023_165401_create_table_AdministrativeHierarchy
 */
class m201023_165401_create_table_administrative_hierarchy extends Migration
{

    public function safeUp()
    {
        $this->createTable(
            'administrative_hierarchy',
            [
                'id' => $this->primaryKey(),
                'object_id' => $this->bigInteger()->notNull(),
                'change_id' => $this->bigInteger()->notNull(),
                'parent_object_id' => $this->bigInteger(),
                'region_code' => $this->smallInteger(),
                'area_code' => $this->string(4),
                'city_code' => $this->string(4),
                'place_code' => $this->string(4),
                'plan_code' => $this->string(4),
                'street_code' => $this->string(4),
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('administrative_hierarchy');
    }
}
