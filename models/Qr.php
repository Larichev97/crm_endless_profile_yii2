<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "qr".
 *
 * @property int $id
 * @property int $client_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $patronymic_name
 * @property string|null $bdate
 * @property string|null $date_death
 * @property string|null $cause_of_death
 * @property string|null $country_born_id
 * @property int|null $city_born_id
 * @property string|null hobby
 * @property string|null $profession
 * @property string|null $biography
 * @property string|null $characteristic
 * @property string|null $last_wish
 * @property string|null $comment
 * @property int|null $profile_status_id
 * @property string|null $geolocation
 * @property string|null $qr_link
 * @property string|null $voice_message
 * @property string|null $slider_img_link
 * @property string|null $photo_link
 * @property string|null $document_link
 * @property string|null $other_link
 * @property string|null $favourite_song
 * @property string|null $date_add
 * @property string|null $date_update
 */
class Qr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crm_project.qr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'first_name', 'last_name', 'date_death', 'biography',], 'required'],
            [['bdate', 'date_death', 'date_add', 'date_update'], 'safe'],
            [['client_id', 'city_born_id', 'profile_status_id'], 'integer'],
            [['biography', 'characteristic', 'last_wish', 'comment', 'hobby', 'geolocation', 'voice_message'], 'string'],
            [['first_name', 'last_name', 'patronymic_name', 'cause_of_death', 'country_born_id', 'profession', 'slider_img_link', 'photo_link', 'document_link', 'other_link', 'favourite_song',], 'string', 'max' => 255],
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
            'qr_link' => 'Изображение QR-кода',
            'slider_img_link' => 'Slider Img Link', // создать отдельную таблицу!
            'photo_link' => 'Личное фото',
            'document_link' => 'Документ',
            'other_link' => 'Ссылка',
            'favourite_song' => 'Любимая песня',
            'date_add' => 'Дата создания',
            'date_update' => 'Дата обновления',
        ];
    }

    public function getProfileQrStatus()
    {
        return $this->hasOne(QrStatus::className(), ['id' => 'profile_status_id']);
    }

    public function getProfileQrStatusName()
    {
        $profile_qr_status_name = $this->profileQrStatus;

        return $profile_qr_status_name ? $profile_qr_status_name->name : '';
    }

    public static function getProfileQrStatusListItems()
    {
        $profile_qr_status_list = QrStatus::find()
            ->select(['id', 'name'])
            ->all();

        return ArrayHelper::map($profile_qr_status_list, 'id', 'name');
    }

    public static function getProfileQrStatusListItemsWithoutNew()
    {
        $profile_qr_status_list = QrStatus::find()
            ->select(['id', 'name'])
            ->where(['<>','id', 1])
            ->all();

        return ArrayHelper::map($profile_qr_status_list, 'id', 'name');
    }

    public function getQrStatuses()
    {
        $qr_statuses = QrStatus::find()
            ->select(['id', 'name', 'color'])
            ->all();

        return $qr_statuses;
    }

    public function getLastQrStatusIdInTable()
    {
        $last_qr_status_id = QrStatus::find()
            ->select(['id'])
            ->orderBy(['id' => \SORT_DESC])
            ->one();

        return $last_qr_status_id['id'];
    }

    public function getQrCountryOfBirth()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_born_id']);
    }

    public function getQrCountryOfBirthName()
    {
        $country_name = $this->qrCountryOfBirth;

        return $country_name ? $country_name->name : '';
    }

    public static function getQrCountrysOfBirthListItems()
    {
        $country_list = Countries::find()
            ->select(['id', 'name'])
            ->all();

        return ArrayHelper::map($country_list, 'id', 'name');
    }

    public function getQrCityOfBirth()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_born_id']);
    }

    public function getQrCityOfBirthName()
    {
        $city_name = $this->qrCityOfBirth;

        return $city_name ? $city_name->name : '';
    }

    public static function getQrCityOfBirthListItems()
    {
        $cities_list = Cities::find()
            ->select(['id', 'name'])
            ->all();

        return ArrayHelper::map($cities_list, 'id', 'name');
    }

    public function getQrName()
    {
        $qr_fio = $this->last_name . ' ' . $this->first_name . ' ' . $this->patronymic_name;

        return $qr_fio ? $qr_fio : '';
    }

    public function getCountQrsAllStatus() {
        $modelQr = self::find()
            ->where(['IS NOT', 'profile_status_id', null])
            ->all();

        $countQrAllStatus = 0;

        foreach ($modelQr as $item) {
            $countQrAllStatus++;
        }

        return $countQrAllStatus;
    }

    public function getCountQrsStatus($profile_status_id) {
        $modelQr = self::find()
            ->where(['profile_status_id' => $profile_status_id])
            ->all();

        $countQrStatus = 0;

        foreach ($modelQr as $item) {
            $countQrStatus++;
        }

        return $countQrStatus;
    }

    public function getPrintQrStatusesBlock($modelQrStatus, $lastQrStatusIdInTable, Qr $modelQr)
    {
        foreach ($modelQrStatus as $item) {
            echo '<div class="row align-items-center justify-content-center">
                <div class="col-lg-8">';
            echo $item['name'];
            echo '</div>
                <div class="col-lg-4 text-right">
                    <a href="/qr/index?QrSearch[profile_status_id]=' . $item['id'] . '">
                        <button data-original-title="Список';

            $this->getTooltipQrStatusTip($item['id']);

            echo '" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color:' . $item['color'] . '"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;">' . $modelQr->getCountQrsStatus($item['id']) . '</span></button></a>
                </div>
            </div>';

            if ($lastQrStatusIdInTable !== $item['id']) {
                echo '<hr>';
            }
        }
    }

    private function getTooltipQrStatusTip($status_id)
    {
        switch ($status_id) {
            case 1:
                echo " новых QR-табличек";
                break;
            case 2:
                echo " QR-табличек, которые создаются";
                break;
            case 3:
                echo " QR-табличек, которые находится у клиентов";
                break;
            case 4:
                echo " потерянных QR-табличек";
                break;
            case 5:
                echo " QR-табличек, у которых не правильный URL";
                break;
        }
    }

}
