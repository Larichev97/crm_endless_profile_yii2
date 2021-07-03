<?php

namespace app\models;

use Carbon\Carbon;
use yii\data\ActiveDataProvider;

/**
 * @property int $id
 * @property int $country_id
 * @property int $city_id
 * @property int $status_id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic_name
 * @property string $phone_number
 * @property string $email
 * @property string $comment
 * @property string $bdate
 * @property string $date_add
 * @property string $date_update
 */

class ClientSearch extends Client
{
    public $date_add_start;
    public $date_add_end;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number', 'first_name', 'city_id'], 'required'],
            [['country_id', 'city_id', 'status_id'], 'integer'],
            [['first_name', 'last_name', 'patronymic_name', 'email', 'phone_number', 'comment',], 'string', 'max' => 255],
            [['date_add', 'date_update', 'bdate', 'date_add_start', 'date_add_end'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ клиента',
            'status_id' => 'Статус клиента',
            'country_id' => 'Страна',
            'city_id' => 'Город',
            'phone_number' => 'Номер телефона',
            'email' => 'E-mail',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic_name' => 'Отчество',
            'comment' => 'Комментарий агента',
            'bdate' => 'Дата рождения',
            'date_add' => 'Дата создания',
            'date_update' => 'Дата обновления',
            'date_add_start' => 'Дата создания c',
            'date_add_end' => 'Дата создания по',
        ];
    }

    public function filter(array $params): ActiveDataProvider
    {
        $query = $this::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        $query->andFilterWhere(['=', 'id', $this->id])
            ->andFilterWhere(['=', 'status_id', $this->status_id])
            ->andFilterWhere(['=', 'country_id', $this->country_id])
            ->andFilterWhere(['=', 'city_id', $this->city_id]);
        //->andFilterWhere(['like', 'date_add', $this->date_add]);

        if (!empty($this->date_add_start)) {
            $query->andFilterWhere(['>=', 'DATE(date_add)', $this->date_add_start]);
        }

        if (!empty($this->date_add_end)) {
            $query->andFilterWhere(['<=', 'DATE(date_add)', $this->date_add_end]);
        }

        $query->orderBy('id ASC');

        return $dataProvider;
    }


    public function getFliterInfoSearch(): string
    {
        if (!empty($this->id)) {
            $id_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('id') . ': ' . $this->id . '</span>';
        } else {
            $id_filter = '';
        }

        if (!empty($this->status_id)) {
            $status_id_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('status_id') . ': ' .$this->getClientStatusName() . '</span>';
        } else {
            $status_id_filter = '';
        }

        if (!empty($this->country_id)) {
            $country_id_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('country_id') . ': ' . $this->getClientCountryName() . '</span>';
        } else {
            $country_id_filter = '';
        }

        if (!empty($this->city_id)) {
            $city_id_id_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('city_id') . ': ' . $this->getClientCityName() . '</span>';
        } else {
            $city_id_id_filter = '';
        }

        if (!empty($this->date_add_start)) {
            $date_add_start_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('date_add_start') . ': ' . Carbon::parse($this->date_add_start)->format('d.m.Y') . '</span>';
        } else {
            $date_add_start_filter = '';
        }

        if (!empty($this->date_add_end)) {
            $date_add_end_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('date_add_end') . ': ' . Carbon::parse($this->date_add_end)->format('d.m.Y') . '</span>';
        } else {
            $date_add_end_filter = '';
        }


        return $id_filter . $status_id_filter . $country_id_filter . $city_id_id_filter . $date_add_start_filter . $date_add_end_filter;
    }

}
