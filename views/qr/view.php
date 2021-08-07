<?php

use Carbon\Carbon;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Qr */

$this->title = 'QR-профиль №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Все QR-профили', 'url' => ['qr/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qr-view">
    <div class="row align-items-center">
        <div class="col-lg-9"><h1>Данные QR-профиля №<?= $model->id ?>  <?= Html::a('Вид QR-профиля <i class="fas fa-qrcode pl-2"></i>', ['profile', 'id' => $model->id], ['class' => 'btn btn-info', 'target' => '_blank']) ?></h1></div>
        <div class="col-lg-3 text-right">
            <p style="margin: 0">
                <?= Html::a('Редактировать <i class="fas fa-edit pl-2"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить <i class="fas fa-trash pl-2"></i>', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы действительно хотите удалить профиль?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'qr_link',
                'format' => 'raw',
                'value' => function ($model) {
                    if (!empty($model->qr_link)) {
                        return '<div style="display:flex; align-items:center;">' . Html::img(Yii::getAlias('@web').'/images/qr-codes/'. $model->qr_link, ['width' => '200px', 'height' => '200px']) . '</div>';
                    } else {
                        return '<div style="display:flex; align-items:center;">' .
                               '<a class="btn btn-warning" data-pjax="0" target="_blank" href="https://api.qrserver.com/v1/create-qr-code/?size=800x800&format=svg&data=http://crm_project/qr/profile?id='. $model->id .'">Сгенерировать QR-КОД<i class="fas fa-qrcode pl-2"></i></a>' .
                                Html::a('Загрузить изображение<i class="fas fa-file-upload pl-2"></i>', ['/qr/upload-qr', 'id' => $model->id], ['class' => 'btn btn-success', 'style' => 'margin-left: 20px;']) .
                               '</div>';
                    }
                }
            ],
            [
                'attribute' => 'client_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<a data-pjax="0" target="_blank" href="/client/view?id=' . $model->client_id . '">' . $model->client_id . '</a>';
                }
            ],
            'first_name',
            'last_name',
            'patronymic_name',
            [
                'attribute' => 'bdate',
                'format' => 'html',
                'value' => function ($model) {
                    return ($model->bdate) ? Carbon::parse($model->bdate)->format('d.m.Y') : '-';
                }
            ],
            [
                'attribute' => 'date_death',
                'format' => 'html',
                'value' => function ($model) {
                    return ($model->date_death) ? Carbon::parse($model->date_death)->format('d.m.Y') : '-';
                }
            ],
            'cause_of_death',
            [
                'attribute' => 'country_born_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->getQrCountryOfBirthName();
                }
            ],
            [
                'attribute' => 'city_born_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->getQrCityOfBirthName();
                }
            ],
            'hobby',
            'profession',
            'biography:ntext',
            'characteristic:ntext',
            'last_wish:ntext',
            'comment:ntext',
            [
                'attribute' => 'profile_status_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->getProfileQrStatusName() . '<i class="fas fa-star pl-2" aria-hidden="true" style="color:' . $model->profileQrStatus->color . ';"></i>';
                }
            ],
            [
                'attribute' => 'geolocation',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model->geolocation) ?
                        '<a target="_blank" data-pjax="0" href="https://www.google.com.ua/maps/search/' . $model->geolocation . '"><i class="fas fa-map-marker-alt" style="color: #ff7675"></i> ' . $model->geolocation . '</a>'
                        : '-';
                }
            ],
            'slider_img_link',
            'photo_link',
            'document_link',
            'other_link',
            [
                'attribute' => 'favourite_song',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model->favourite_song) ?
                        '<a target="_blank" data-pjax="0" href="https://music.youtube.com/search?q=' . $model->favourite_song . '"><i class="fab fa-youtube" style="color: #FF0000"></i> ' . $model->favourite_song . '</a>' . '</br>' .
                        '<a target="_blank" data-pjax="0" href="https://open.spotify.com/search/' . $model->favourite_song . '"><i class="fab fa-spotify" style="color: #1DB954; background-color: #000000"></i> ' . $model->favourite_song . '</a>'
                        : '-';
                }
            ],
            [
                'attribute' => 'voice_message',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model->voice_message) ?
//                        "<audio controls>
//                            <source src='" . Yii::getAlias('@web') . "audio/qr-voice-messages/" . $model->voice_message . "' type='mp3'>
//                         </audio>"
                        $model->voice_message
                        : '-';
                }
            ],
        ],
    ]) ?>

</div>
