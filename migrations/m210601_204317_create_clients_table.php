<?php

use yii\db\Migration;

/**
 * Handles the creation of table `crm_project.clients`.
 */
class m210601_204317_create_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('crm_project.clients', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'patronymic_name' => $this->string(),
            'bdate' => $this->date(),
            'country_id' => $this->string(),
            'city_id' => $this->integer(),
            'status_id' => $this->integer(),
            'email' => $this->string(),
            'phone_number' => $this->string(),
            'comment' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('crm_project.clients');
    }
}
