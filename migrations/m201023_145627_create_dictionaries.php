<?php

use yii\db\Migration;

/**
 * Class m201023_145627_create_dictionaries
 */
class m201023_145627_create_dictionaries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'AddressObjectTypes',
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
            'ObjectLevels',
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

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('AddressObjectTypes');
        $this->dropTable('ObjectLevels');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201023_145627_create_dictionaries cannot be reverted.\n";

        return false;
    }
    */
}
