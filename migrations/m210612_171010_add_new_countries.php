<?php

use yii\db\Migration;

/**
 * Class m210612_171010_add_new_countries
 */
class m210612_171010_add_new_countries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('crm_project.сountries', ['name'], [
            ['Украина'],
            ['Россия'],
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
