<?php

use yii\db\Migration;

/**
 * Handles the creation of table `crm_project.qr_status`.
 */
class m210620_163650_create_qr_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('crm_project.qr_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'color' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('crm_project.qr_status');
    }
}
