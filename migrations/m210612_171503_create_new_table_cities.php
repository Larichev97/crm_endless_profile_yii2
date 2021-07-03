<?php

use yii\db\Migration;

/**
 * Class m210612_171503_create_new_table_cities
 */
class m210612_171503_create_new_table_cities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('crm_project.cities', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'country_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       return false;
    }

}
