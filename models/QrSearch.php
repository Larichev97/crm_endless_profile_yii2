<?php

namespace app\models;

use app\services\filter_builder\QrSearchBuilder;
use app\services\filter_builder\SearchFilterCreator;
use Carbon\Carbon;
use Yii;
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
            [['first_name', 'last_name', 'patronymic_name', 'bdate', 'date_death', 'cause_of_death', 'country_born_id', 'profession', 'biography', 'characteristic', 'last_wish', 'comment', 'slider_img_link', 'photo_link', 'document_link', 'other_link', 'favourite_song', 'date_add', 'date_update', 'hobby', 'geolocation',], 'safe'],
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
        // TEST BUILDER в QrSearch --------------------------------------------------------------------------

        $creator = new SearchFilterCreator();   // #1

        $this->load($params);

        $request = Yii::$app->request->get('QrSearch');

        //echo '<pre>'; var_dump($request); die();  // test array

        $qrBuilder = new QrSearchBuilder([  // #2
            $request
        ]);

        //echo '<pre>'; var_dump($qrBuilder); die();  // test array

        $qrProvider = $creator->searchFilterBuild($qrBuilder);  // #3

        //echo '<pre>'; var_dump($qrProvider); die();  // test array

        return $qrProvider;  // #4
        //---------------------------------------------------------------------------------------------------
        //  ЗАКОММЕНТИРОВАНО 02.08.21
//        $query = Qr::find();
//
//        // add conditions that should always apply here
//
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//            'pagination' => [
//                'pageSize' => 20,
//            ],
//        ]);
//
//        $this->load($params);
//
//
//        // grid filtering conditions
//
//        $query->andFilterWhere(['=', 'id', $this->id])
//            ->andFilterWhere(['=', 'client_id', $this->client_id])
//            ->andFilterWhere(['=', 'country_born_id', $this->country_born_id])
//            ->andFilterWhere(['=', 'city_born_id', $this->city_born_id])
//            ->andFilterWhere(['=', 'profile_status_id', $this->profile_status_id]);
//
//
//        if (!empty($this->date_add_start)) {
//            $query->andFilterWhere(['>=', 'DATE(date_add)', $this->date_add_start]);
//        }
//
//        if (!empty($this->date_add_end)) {
//            $query->andFilterWhere(['<=', 'DATE(date_add)', $this->date_add_end]);
//        }
//
//        if ($client_qrs) {      // Только qr's клиента
//            $query->andWhere(['client_id' => $client_id]);
//        }
//
//        $query->orderBy('date_add DESC');
//
//        return $dataProvider;
    }

    public function getQrFliterInfoSearch(): string
    {
        if (!empty($this->id)) {
            $id_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('id') . ': ' . $this->id . '</span>';
        } else {
            $id_filter = '';
        }

        if (!empty($this->client_id)) {
            $client_id_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('client_id') . ': ' . $this->client_id . '</span>';
        } else {
            $client_id_filter = '';
        }

        if (!empty($this->profile_status_id)) {
            $profile_status_id_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('profile_status_id') . ': ' .$this->getProfileQrStatusName() . '</span>';
        } else {
            $profile_status_id_filter = '';
        }

        if (!empty($this->country_born_id)) {
            $country_born_id_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('country_born_id') . ': ' . $this->getQrCountryOfBirthName() . '</span>';
        } else {
            $country_born_id_filter = '';
        }

        if (!empty($this->city_born_id)) {
            $city_born_id_id_filter = '<span class="label" style="color: #d9534f; font-size: 14px;">' . $this->getAttributeLabel('city_born_id') . ': ' . $this->getQrCityOfBirthName() . '</span>';
        } else {
            $city_born_id_id_filter = '';
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


        return $id_filter . $client_id_filter . $profile_status_id_filter . $country_born_id_filter . $city_born_id_id_filter . $date_add_start_filter . $date_add_end_filter;
    }
}
