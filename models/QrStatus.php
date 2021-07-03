<?php

namespace app\models;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "qr_status".
 *
 * @property int $id
 * @property string $name
 * @property string $color
 */

class QrStatus extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crm_project.qr_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name',], 'string', 'max' => 255],
            [['color',], 'safe',],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Статус',
            'color' => 'Цвет статуса',
        ];
    }


}