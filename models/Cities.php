<?php

namespace app\models;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property int $country_id
 * @property string $name
 */

class Cities extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crm_project.cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id',], 'integer'],
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
            'country_id' => 'ID страны',
            'name' => 'Город',
        ];
    }


}