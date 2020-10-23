<?php

use yii\db\Migration;

/**
 * Class m201023_165343_create_table_AddressObjects
 */
class m201023_165343_create_table_AddressObjects extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'AddressObjects',
            [
                'id' => $this->primaryKey(),
                'object_id' => $this->bigInteger()->notNull(),
                'object_guid' => $this->string(36)->notNull(),
                'change_id' => $this->bigInteger()->notNull(),
                'name' => $this->string(250)->notNull(),
                'type_name' => $this->string(50)->notNull(),
                'level' => $this->string(10)->notNull(), // ???
                'operation_type_id' => $this->tinyInteger()->notNull(),
                'prev_id' => $this->bigInteger(),
                'next_id' => $this->bigInteger(),
                'start_date' => $this->date()->notNull(),
                'end_date' => $this->date()->notNull(),
                'update_date' => $this->date()->notNull(),
                'is_active' => $this->boolean()->notNull(),
                'is_actual' => $this->boolean()->notNull(),
            ]
        );

        $this->createIndex(
            'idx_ao_obj_id',
            'AddressObjects',
            'object_id'
        );

        $this->createIndex(
            'idx_ao_guid',
            'AddressObjects',
            'object_guid'
        );

        $this->createIndex(
            'idx_ao_name',
            'AddressObjects',
            'name'
        );

        $this->createIndex(
            'idx_ao_level',
            'AddressObjects',
            'level'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('AddressObjects');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201023_165343_create_table_AddressObjects cannot be reverted.\n";

        return false;
    }
    */
}
