<?php

namespace app\models;


use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "client".
 *
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

class Client extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crm_project.clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number', 'first_name', 'city_id'], 'required'],
            [['country_id', 'city_id', 'status_id'], 'integer'],
            [['first_name', 'last_name', 'patronymic_name', 'email', 'phone_number', 'comment',], 'string', 'max' => 255],
            [['date_add', 'date_update', 'bdate',], 'safe'],

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
        ];
    }

    public function getClientStatus()
    {
        return $this->hasOne(ClientStatus::className(), ['id' => 'status_id']);
    }

    public function getClientStatusName()
    {
        $client_status_name = $this->clientStatus;

        return $client_status_name ? $client_status_name->name : '';
    }

    public static function getClientStatusListItems()
    {
        $client_status_list = ClientStatus::find()
            ->select(['id', 'name'])
            ->all();

        return ArrayHelper::map($client_status_list, 'id', 'name');
    }

    public static function getClientStatusListItemsWithoutNew()
    {
        $client_status_list = ClientStatus::find()
            ->select(['id', 'name'])
            ->where(['<>', 'id', 1])
            ->all();

        return ArrayHelper::map($client_status_list, 'id', 'name');
    }

    public function getClientStatuses()
    {
        $client_statuses = ClientStatus::find()
            ->select(['id', 'name', 'color'])
            ->all();

        return $client_statuses;
    }

    public function getLastClientStatusIdInTable()
    {
        $last_client_status_id = ClientStatus::find()
            ->select(['id'])
            ->orderBy(['id' => \SORT_DESC])
            ->one();

        return $last_client_status_id['id'];
    }

    public function getClientCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
    }

    public function getClientCountryName()
    {
        $country_name = $this->clientCountry;

        return $country_name ? $country_name->name : '';
    }

    public static function getClientCountriesListItems()
    {
        $country_list = Countries::find()
            ->select(['id', 'name'])
            ->all();

        return ArrayHelper::map($country_list, 'id', 'name');
    }

    public function getClientCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }

    public function getClientCityName()
    {
        $city_name = $this->clientCity;

        return $city_name ? $city_name->name : '';
    }

    public static function getClientCitiesUAListItems()
    {
        $country_list = Cities::find()
            ->select(['id', 'name'])
            ->where(['country_id' => 1])
            ->all();

        return ArrayHelper::map($country_list, 'id', 'name');
    }

    public static function getClientCitiesListItems($country_id)
    {
        $country_list = Cities::find()
            ->select(['id', 'name'])
            ->where(['country_id' => $country_id])
            ->all();

        return ArrayHelper::map($country_list, 'id', 'name');
    }

    public function getClientName()
    {
        $client_fio = $this->last_name . ' ' . $this->first_name . ' ' . $this->patronymic_name;

        return $client_fio ? $client_fio : '';
    }

    public function getCountClientsAllStatus()
    {
        $modelClient = self::find()
            ->where(['IS NOT', 'status_id', null])
            ->all();

        $countClientAllStatus = 0;

        foreach ($modelClient as $item) {
            $countClientAllStatus++;
        }

        return $countClientAllStatus;
    }

    public function getCountClientsStatus($status_id)
    {
        $modelClient = self::find()
            ->where(['status_id' => $status_id])
            ->all();

        $countClientStatus = 0;

        foreach ($modelClient as $item) {
            $countClientStatus++;
        }

        return $countClientStatus;
    }

    public function getPrintClientStatusesBlock($modelClientStatus, $lastClientStatusIdInTable, Client $modelClient)
    {
        foreach ($modelClientStatus as $item) {
            echo '<div class="row align-items-center justify-content-center">
                <div class="col-lg-8">';
            echo $item['name'];
            echo '</div>
                <div class="col-lg-4 text-right">
                    <a href="/client/index?ClientSearch[status_id]=' . $item['id'] . '">
                        <button data-original-title="Список';

            $this->getTooltipClientStatusTip($item['id']);

            echo 'клиентов" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color:' . $item['color'] . '"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;">' . $modelClient->getCountClientsStatus($item['id']) . '</span></button></a>
                </div>
            </div>';

            if ($lastClientStatusIdInTable !== $item['id']) {
                echo '<hr>';
            }
        }
    }

    private function getTooltipClientStatusTip($status_id)
    {
        switch ($status_id) {
            case 1:
                echo " новых ";
                break;
            case 2:
                echo " активных ";
                break;
            case 3:
                echo " приостановленных ";
                break;
            case 4:
                echo " отмененных ";
                break;
        }
    }

}