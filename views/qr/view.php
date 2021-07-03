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
    <div class="row">
        <div class="col-lg-9"><h1>Данные QR-профиля №<?= $model->id ?></h1></div>
        <div class="col-lg-3 text-right">
            <p>
                <?= Html::a('Редактировать <i class="fas fa-edit pl-2"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить <i class="fas fa-trash pl-2"></i>', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
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
                    return $model->getProfileQrStatusName() . '<i class="fa fa-circle pl-2" aria-hidden="true" style="color:' . $model->profileQrStatus->color . ';"></i>';
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
        ],
    ]) ?>

</div>
