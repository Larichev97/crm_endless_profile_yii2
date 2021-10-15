<?php

use yii\db\Migration;

/**
 * Class m211015_084844_create_new_table_qr_sliders
 */
class m211015_084844_create_new_table_qr_sliders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('crm_project.qr_sliders', [
            'id' => $this->primaryKey(),
            'file_name' => $this->string(),
            'qr_id' => $this->integer(),
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
