<?php

use yii\db\Migration;

/**
 * Class m201028_101509_add_indexes
 */
class m201028_101509_add_indexes extends Migration
{

    public function safeUp()
    {
        // Indexes for address_objects table
        $this->createIndex(
            'idx_ao_obj_id',
            'address_objects',
            'object_id'
        );

        $this->createIndex(
            'idx_ao_guid',
            'address_objects',
            'object_guid'
        );

        $this->createIndex(
            'idx_ao_name',
            'address_objects',
            'name'
        );

        $this->createIndex(
            'idx_ao_level',
            'address_objects',
            'level'
        );

        // Indexes for address_objects table
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

    public function safeDown()
    {
    }
}
