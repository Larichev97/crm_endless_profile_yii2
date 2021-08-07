<?php

namespace app\models;

use app\services\filter_builder\ClientSearchBuilder;
use app\services\filter_builder\SearchFilterCreator;
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
            [['country_id', 'city_id', 'status_id', 'id'], 'integer'],
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
        $creator = new SearchFilterCreator();

        $this->load($params);

        $clientBuilder = new ClientSearchBuilder($params);

        $clientProvider = $creator->searchFilterBuild($clientBuilder);

        return $clientProvider;
    }

    public function getClientFliterInfoSearch(): string
    {
        $field_id = $this->InfoWithId('id');
        $field_status_id = $this->InfoWithId('status_id', $this->getClientStatusName());
        $field_country_id = $this->InfoWithId('country_id', $this->getClientCountryName());
        $field_city_id = $this->InfoWithId('city_id', $this->getClientCityName());
        $field_date_add_start = $this->InfoWithDate('date_add_start');
        $field_date_add_end = $this->InfoWithDate('date_add_end');

        return $field_id . $field_status_id . $field_country_id . $field_city_id . $field_date_add_start . $field_date_add_end;
    }

    private function InfoWithId(string $field, string $method = null)
    {
        if (!empty($this->$field) && !empty($method)) {
            $id_filter_info = '<span class="label" style="color: #00759C; font-size: 14px; background-color: #d1d8e0; margin-left: 5px; !important; border-radius: 20px;">' . $this->getAttributeLabel('' . $field) . ': ' . $method . '</span>';
        } elseif (!empty($this->$field)) {
            $id_filter_info = '<span class="label" style="color: #00759C; font-size: 14px; background-color: #d1d8e0; margin-left: 5px; !important; border-radius: 20px;">' . $this->getAttributeLabel('' . $field) . ': ' . $this->$field . '</span>';
        } else {
            $id_filter_info = '';
        }

        return $id_filter_info;
    }

    private function InfoWithDate(string $field)
    {
        if (!empty($this->$field)) {
            $date_filter_info = '<span class="label" style="color: #00759C; font-size: 14px; background-color: #d1d8e0; margin-left: 5px; !important; border-radius: 20px;">' . $this->getAttributeLabel('' . $field) . ': ' . Carbon::parse($this->$field)->format('d.m.Y') . '</span>';
        } else {
            $date_filter_info = '';
        }

        return $date_filter_info;
    }


}
