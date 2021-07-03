<?php

use yii\db\Migration;

/**
 * Class m210601_205914_add_new_columns_into_clients
 */
class m210601_205914_add_new_columns_into_clients extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('crm_project.clients','date_add', $this->dateTime());
        $this->addColumn('crm_project.clients','date_update', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('crm_project.clients','date_add');
        $this->dropColumn('crm_project.clients','date_update');
    }
}
