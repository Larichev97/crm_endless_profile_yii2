<?php

namespace app\models;


/**
 * QrSearch represents the model behind the search form of `app\models\QrSlider`.
 */
class QrSliderSearch extends QrSlider
{
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
            'id' => '№ слайда',
            'qr_id' => '№ Qr-профиля',
            'file_name' => 'Вложение',
        ];
    }

    public function search($qr_id)
    {
        $query = QrSliderSearch::find()
            ->where(['qr_id' => $qr_id]);

        $query->andFilterWhere(['=', 'id', $this->id]);
        $query->andFilterWhere(['like', 'file_name', $this->file_name]);

        $query->orderBy(['id' => SORT_ASC]);

        return $query;
    }
}
