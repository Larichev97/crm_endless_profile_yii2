<?php

use yii\db\Migration;

/**
 * Handles the creation of table `crm_project.client_status`.
 */
class m210605_211312_create_client_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('crm_project.client_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('crm_project.client_status');
    }
}
