<?php

use yii\db\Migration;

/**
 * Class m201023_165401_create_table_AdministrativeHierarchy
 */
class m201023_165401_create_table_administrative_hierarchy extends Migration
{
    /**
     * {@inheritdoc}
     */
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
                'prev_id' => $this->bigInteger(),
                'next_id' => $this->bigInteger(),
                'start_date' => $this->date()->notNull(),
                'end_date' => $this->date()->notNull(),
                'update_date' => $this->date()->notNull(),
                'is_active' => $this->boolean()->notNull(),
            ]
        );

        $this->createIndex(
            'idx_ah_obj_id',
            'administrative_hierarchy',
            'object_id'
        );

        $this->createIndex(
            'idx_ah_par_obj_id',
            'administrative_hierarchy',
            'parent_object_id'
        );

        $this->createIndex(
            'idx_ah_reg_code',
            'administrative_hierarchy',
            'region_code'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('administrative_hierarchy');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201023_165401_create_table_AdministrativeHierarchy cannot be reverted.\n";

        return false;
    }
    */
}
