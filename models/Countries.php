<?php

namespace app\models;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "сountries".
 *
 * @property int $id
 * @property string $name
 */

class Countries extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crm_project.сountries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name',], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Страна',
        ];
    }

    public function getCities()
    {
        return $this->hasMany(Cities::className(), ['id' => 'country_id']);
    }

}