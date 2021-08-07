<?php

namespace app\models;

use app\services\filter_builder\QrSearchBuilder;
use app\services\filter_builder\SearchFilterCreator;
use Carbon\Carbon;
use yii\data\ActiveDataProvider;

/**
 * QrSearch represents the model behind the search form of `app\models\Qr`.
 */
class QrSearch extends Qr
{
    public $date_add_start;
    public $date_add_end;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'first_name', 'last_name', 'date_death', 'biography',], 'required'],
            [['id', 'client_id', 'city_born_id', 'profile_status_id'], 'integer'],
            [['first_name', 'last_name', 'patronymic_name', 'bdate', 'date_death', 'cause_of_death', 'country_born_id', 'profession', 'biography', 'characteristic', 'last_wish', 'comment', 'slider_img_link', 'photo_link', 'document_link', 'other_link', 'favourite_song', 'date_add', 'date_update', 'hobby', 'geolocation', 'date_add_start', 'date_add_end'], 'safe'],
            [['qr_link'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, svg'],
            [['voice_message'], 'file', 'skipOnEmpty' => true, 'extensions' => 'mp3, wav'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ профиля',
            'client_id' => '№ клиента',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic_name' => 'Отчество',
            'bdate' => 'Дата рождения',
            'date_death' => 'Дата смерти',
            'cause_of_death' => 'Причина смерти',
            'country_born_id' => 'Страна рождения',
            'city_born_id' => 'Город рождения',
            'hobby' => 'Увлечения',
            'profession' => 'Род деятельности',
            'biography' => 'Биография',
            'characteristic' => 'Характеристика',
            'last_wish' => 'Последнее пожелание',
            'voice_message' => 'Голосовое сообщение',
            'comment' => 'Комментарий агента',
            'profile_status_id' => 'Статус QR-таблички',
            'geolocation' => 'Геолокация таблички',
            'slider_img_link' => 'Slider Img Link', // создать отдельную таблицу!
            'photo_link' => 'Личное фото',
            'document_link' => 'Документ',
            'other_link' => 'Ссылка',
            'favourite_song' => 'Любимая песня',
            'date_add' => 'Дата создания',
            'date_update' => 'Дата обновления',
            'date_add_start' => 'Дата создания c',
            'date_add_end' => 'Дата создания по',
        ];
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function qrFilter($params, bool $client_qrs = false, $client_id = null)
    {
        $creator = new SearchFilterCreator();

        $this->load($params);

        $qrBuilder = new QrSearchBuilder($params,$client_qrs,$client_id);

        $qrProvider = $creator->searchFilterBuild($qrBuilder);

        return $qrProvider;
    }

    public function getQrFliterInfoSearch(): string
    {
        $field_id = $this->InfoWithId('id');
        $field_client_id = $this->InfoWithId('client_id');
        $field_profile_status_id = $this->InfoWithId('profile_status_id', $this->getProfileQrStatusName());
        $field_country_born_id = $this->InfoWithId('country_born_id', $this->getQrCountryOfBirthName());
        $field_city_born_id = $this->InfoWithId('city_born_id', $this->getQrCityOfBirthName());
        $field_date_add_start = $this->InfoWithDate('date_add_start');
        $field_date_add_end = $this->InfoWithDate('date_add_end');

        return $field_id . $field_client_id . $field_profile_status_id . $field_country_born_id . $field_city_born_id . $field_date_add_start . $field_date_add_end;
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
