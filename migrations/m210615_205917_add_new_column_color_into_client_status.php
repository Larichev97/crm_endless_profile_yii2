<?php

use yii\db\Migration;

/**
 * Class m210615_205917_add_new_column_color_into_client_status
 */
class m210615_205917_add_new_column_color_into_client_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('crm_project.client_status','color', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('crm_project.client_status','color');
    }
}
