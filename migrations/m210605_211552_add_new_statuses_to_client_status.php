<?php

use yii\db\Migration;

/**
 * Class m210605_211552_add_new_statuses_to_client_status
 */
class m210605_211552_add_new_statuses_to_client_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->batchInsert('crm_project.client_status', ['name','color'], [
             ['Новый','#9c88ff'],
             [ 'Активный','#4cd137'],
             [ 'Заморожен','#0097e6'],
             [ 'Отменен','#eb2f06'],
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
