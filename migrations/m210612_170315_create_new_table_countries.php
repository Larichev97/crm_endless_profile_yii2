<?php

use yii\db\Migration;

/**
 * Class m210612_170315_create_new_table_countries
 */
class m210612_170315_create_new_table_countries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('crm_project.сountries', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
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
