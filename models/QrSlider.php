<?php

namespace app\models;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "qr_sliders".
 *
 * @property int $id
 * @property int $qr_id
 * @property string $file_name
 */

class QrSlider extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crm_project.qr_sliders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'qr_id',], 'integer'],
            [['file_name',], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qr_id' => 'ID Qr-профиля',
            'file_name' => 'Вложение',
        ];
    }


}