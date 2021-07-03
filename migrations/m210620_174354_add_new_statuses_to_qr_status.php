<?php

use yii\db\Migration;

/**
 * Class m210620_174354_add_new_statuses_to_qr_status
 */
class m210620_174354_add_new_statuses_to_qr_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('crm_project.qr_status', ['name','color'], [
            ['Новая','#9c88ff'],
            [ 'Создаётся','#fbc531'],
            [ 'У клиента','#4cd137'],
            [ 'Потеряна','#eb2f06'],
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
