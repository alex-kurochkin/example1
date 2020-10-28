<?php

use yii\db\Migration;

/**
 * Class m201023_145627_create_dictionaries
 */
class m201023_145627_create_dictionaries extends Migration
{

    public function safeUp()
    {
        $this->createTable(
            'address_object_types',
            [
                'id' => $this->primaryKey(),
                'level' => $this->smallInteger()->notNull(),
                'name' => $this->string(250)->notNull(),
                'short_name' => $this->string(50)->notNull(),
                'desc' => $this->string(250),
                'start_date' => $this->date()->notNull(),
                'end_date' => $this->date()->notNull(),
                'update_date' => $this->date()->notNull(),
                'is_active' => $this->boolean()->notNull(),
            ]
        );

        $this->createTable(
            'object_levels',
            [
                'level' => $this->primaryKey(),
                'name' => $this->string(250)->notNull(),
                'short_name' => $this->string(50),
                'start_date' => $this->date()->notNull(),
                'end_date' => $this->date()->notNull(),
                'update_date' => $this->date()->notNull(),
                'is_active' => $this->boolean()->notNull(),
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('address_object_types');
        $this->dropTable('object_levels');
    }
}
