<?php

use Carbon\Carbon;

use yii\bootstrap4\Breadcrumbs;

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $searchModelQrSearch app\models\QrSearch */

$this->title = 'Все QR-профили';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('../web/js/qr/qr.js');

?>

<?php
Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>

<?php Pjax::begin(['id' => 'pjaxQr']); ?>

<?php echo $this->render('_search', ['searchModelQrSearch' => $searchModelQrSearch, 'qrSearchProvider' => $qrSearchProvider]); ?>

<?php

?>
<div class="row panel panel-default">
    <div class="col-lg-12" style="background-color:#00759C; padding-left:3px; padding-right:3px;">
        <div class="accordion show mt-1 mb-1" id="accordionQr">
            <div class="card">
                <div class="card-header" id="headingQr">
                    <div class="row">
                        <div class="col-lg-10 text-left font-weight-bold" style="padding-top: 5px; width: 100%;" data-toggle="collapse" data-target="#collapseQr" aria-expanded="true" aria-controls="collapseOne">
                            <h3 style="margin: 0; font-weight: bold">
                                Все QR-профили
                            </h3>
                        </div>
                        <div class="col-lg-2 text-right">
                            <?= \yii\helpers\Html::a('Добавить QR <i class="fas fa-qrcode pl-2"></i>', ['create'], ['class' => 'btn btn-success stop-event', 'data-original-title' => 'Добавить информацию для нового QR-профиля', 'data-toggle' => 'tooltip', 'data-placement' => 'top',]) ?>
                        </div>
                    </div>
                </div>

                <div id="collapseQr" class="collapse show" aria-labelledby="headingQr" data-parent="#accordionQr">
                    <div class="card-body">
                        <?=
                        GridView::widget([
                            'dataProvider' => $qrSearchProvider,
                            'filterModel' => $searchModelQrSearch,
                            'columns' => [
                                [
                                    'headerOptions' => ['width' => '50'],
                                    'attribute' => 'id',
                                    'content' => function ($data) {
                                        return '<a target="_blank" data-pjax="0" href="/qr/view?id=' . $data->id . '">' . $data->id . '</a>';
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '50'],
                                    'attribute' => 'client_id',
                                    'content' => function ($data) {
                                        return '<a target="_blank" data-pjax="0" href="/client/view?id=' . $data->client_id . '">' . $data->client_id . '</a>';
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '220'],
                                    'label' => 'Ф.И.О',
                                    'filter' => false,
                                    'content' => function ($data) {
                                        return $data->getQrName();
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '85'],
                                    'attribute' => 'bdate',
                                    'filter' => false,
                                    'content' => function ($data) {
                                        return ($data->bdate) ? Carbon::parse($data->bdate)->format('d.m.Y') : 'XX.XX.XXXX';
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '85'],
                                    'attribute' => 'date_death',
                                    'filter' => false,
                                    'content' => function ($data) {
                                        return ($data->date_death) ? Carbon::parse($data->date_death)->format('d.m.Y') : 'XX.XX.XXXX';
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '130'],
                                    'attribute' => 'profile_status_id',
                                    'filter' => \app\models\Qr::getProfileQrStatusStatusListItems(),
                                    'filterInputOptions' => [
                                        'class' => 'form-control',
                                        'prompt' => 'Выберите...',
                                    ],
                                    'content' => function ($data) {
                                        return $data->getProfileQrStatusName() . '<i class="fas fa-star pull-right" aria-hidden="true" style="color:' . $data->profileQrStatus->color . ';"></i>';
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '80'],
                                    'attribute' => 'country_born_id',
                                    'filter' => \app\models\Qr::getQrCountrysOfBirthListItems(),
                                    'filterInputOptions' => [
                                        'class' => 'form-control',
                                        'prompt' => 'Выберите...',
                                    ],
                                    'content' => function ($data) {
                                        return  $data->getQrCountryOfBirthName();
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '130'],
                                    'attribute' => 'city_born_id',
                                    'filter' => \app\models\Qr::getQrCityOfBirthListItems(),
                                    'filterInputOptions' => [
                                        'class' => 'form-control',
                                        'prompt' => 'Выберите...',
                                    ],
                                    'content' => function ($data) {
                                        return  $data->getQrCityOfBirthName();
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '85'],
                                    'attribute' => 'date_add',
                                    'filter' => false,
                                    'content' => function ($data) {
                                        return ($data->date_add) ? Carbon::parse($data->date_add)->format('d.m.Y H:i') : '-';
                                    },
                                ],
                                ['class' => 'yii\grid\ActionColumn',
                                    'headerOptions' => ['width' => '25'],
                                    'template' => '{view}',
                                    'buttons' => [
                                        'view' => function ($url, $data) {
                                            return Html::a('', ['qr/view', 'id' => $data->id], ['class' => 'fas fa-eye icon-eye-open',
                                                'style' => 'text-decoration:none',
                                                'data-original-title' => 'Просмотр QR-профиля',
                                                'data-toggle' => 'tooltip',
                                            ]);
                                        }
                                    ],
                                ],
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php Pjax::end() ?>
