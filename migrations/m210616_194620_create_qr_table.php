<?php

use yii\db\Migration;

/**
 * Handles the creation of table `crm_project.qr`.
 */
class m210616_194620_create_qr_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('crm_project.qr', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'patronymic_name' => $this->string(),
            'bdate' => $this->date(),
            'date_death' => $this->date(),
            'cause_of_death' => $this->string(),
            'country_born_id' => $this->string(),
            'city_born_id' => $this->integer(),
            'hobby' => $this->text(),
            'profession' => $this->string(),
            'biography' => $this->text(),
            'characteristic' => $this->text(),
            'last_wish' => $this->text(),
            'comment' => $this->text(),
            'profile_status_id' => $this->integer(),
            'geolocation' => $this->string(),
            'voice_message' => $this->string(),
            'qr_link' => $this->string(),
            'slider_img_link' => $this->string(),
            'photo_link' => $this->string(),
            'document_link' => $this->string(),
            'other_link' => $this->string(),
            'favourite_song' => $this->string(),
            'date_add' => $this->dateTime(),
            'date_update' => $this->dateTime(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('crm_project.qr');
    }
}
