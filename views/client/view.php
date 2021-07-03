<?php

use Carbon\Carbon;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $modelClient app\models\Client */
/* @var $searchModelAngel app\models\QrSearch */


$this->title = 'Карта клиента';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['client/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-10">
        <h1><b>КАРТОЧКА КЛИЕНТА № <?= $modelClient->id ?></b></h1>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-primary" target="_blank" href="/client/update?id=<?= $modelClient->id ?>">
            Редактировать <i class="fas fa-edit pl-2"></i>
        </a>
    </div>
</div>

<div class="row panel panel-default">
    <!--  ROW 1  -->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card" style="border: solid 2px #00759C; background-color: #f5f5f5; height:100%;">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150" style="border: solid 4px #00759C;">
                            <div class="mt-3">
                                <h4><?= $modelClient->first_name . ' ' . $modelClient->last_name ?></h4>
                                <p class="text-muted font-size-sm">г. <?= $modelClient->getClientCityName() . ', ' . $modelClient->getClientCountryName() ?></p>
                                <button class="btn btn-primary">Кнопка 1</button>
                                <button class="btn btn-outline-primary">Кнопка 2</button>
                            </div>
                        </div>
                        <hr>
<!--                        <div class="row">-->
                            <div class="col-sm-12 pl-0 pr-0">
                                <h6 class="mb-0">
                                    <b><?= $modelClient->getAttributeLabel('comment') ?> :</b>
                                </h6>
                            </div>
                            <div class="col-sm-12 text-secondary pl-0 pr-0">
                                <?= $modelClient->comment ?>
                            </div>
<!--                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3" style="border: solid 2px #00759C; background-color: #f5f5f5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">
                                    <b><?= $modelClient->getAttributeLabel('status_id') ?></b>
                                </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <?= $modelClient->getClientStatusName() ?><i class="fa fa-circle pl-2" aria-hidden="true" style="color: <?= $modelClient->clientStatus->color ?>"></i>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">
                                    <b>Ф.И.О</b>
                                </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <?= $modelClient->getClientName() ?>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">
                                    <b><?= $modelClient->getAttributeLabel('bdate') ?></b>
                                </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <?= ($modelClient->bdate) ? Carbon::parse($modelClient->bdate)->format('d.m.Y') : '-' ?>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">
                                    <b><?= $modelClient->getAttributeLabel('phone_number') ?></b>
                                </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <?= $modelClient->phone_number ?>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">
                                    <b><?= $modelClient->getAttributeLabel('email') ?></b>
                                </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <?= $modelClient->email ?>
                            </div>
                        </div><hr>
<!--                        <div class="row">-->
<!--                            <div class="col-sm-4">-->
<!--                                <h6 class="mb-0">-->
<!--                                    <b>--><?php //= $modelClient->getAttributeLabel('comment') ?><!--</b>-->
<!--                                </h6>-->
<!--                            </div>-->
<!--                            <div class="col-sm-8 text-secondary">-->
<!--                                --><?php //= $modelClient->comment ?>
<!--                            </div>-->
<!--                        </div><hr>-->
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">
                                    <b><?= $modelClient->getAttributeLabel('date_add') ?></b>
                                </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <?= ($modelClient->date_add) ? Carbon::parse($modelClient->date_add)->format('d.m.Y H:i') : '-'; ?>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">
                                    <b><?= $modelClient->getAttributeLabel('date_update') ?></b>
                                </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <?= ($modelClient->date_update) ? Carbon::parse($modelClient->date_update)->format('d.m.Y H:i') : '-'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--  ROW 2  -->
    <div class="col-lg-12">
        <div class="accordion show mt-1 mb-1" id="accordionClientsQr" style="border: solid 2px #00759C; background-color: #f5f5f5">
            <div class="card">
                <div class="card-header" id="headingClientsQr">
                    <div class="row">
                        <div class="col-lg-10 text-left font-weight-bold" style="padding-top: 5px; width: 100%;" data-toggle="collapse" data-target="#collapseClientsQr" aria-expanded="true" aria-controls="collapseOne">
                            <h3 style="margin: 0; font-weight: bold">
                                QR-профили клиента
                            </h3>
                        </div>
                        <div class="col-lg-2 text-right">
                            <?= \yii\helpers\Html::a('Добавить QR <i class="fas fa-qrcode pl-2"></i>', ['qr/create'], ['class' => 'btn btn-success stop-event', 'data-original-title' => 'Добавить информацию для нового QR-профиля', 'data-toggle' => 'tooltip', 'data-placement' => 'top',]) ?>
                        </div>
                    </div>
                </div>

                <?php Pjax::begin(['id' => 'pjaxClientQr']); ?>
                <div id="collapseClientsQr" class="collapse show" aria-labelledby="headingClientsQr" data-parent="#accordionClientsQr">
                    <div class="card-body">
                        <?=
                        GridView::widget([
                            'dataProvider' => $qrSearchProvider,
                            'filterModel' => $searchModelQr,
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
//                                [
//                                    'headerOptions' => ['width' => '130'],        // CREATE MODEL/Table !!!
//                                    'attribute' => 'profile_status_id',
//                                    'filter' => \app\models\Qr::getProfileQrStatusStatusListItems(),
//                                    'filterInputOptions' => [
//                                        'class' => 'form-control',
//                                        'prompt' => 'Выберите...',
//                                    ],
//                                    'content' => function ($data) {
//                                        return $data->getProfileQrStatusName();
//                                    },
//                                ],
                                [
                                    'headerOptions' => ['width' => '80'],
                                    'attribute' => 'country_born_id',
                                    'filter' => \app\models\Qr::getQrCountrysOfBirthListItems(),
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
                                    'headerOptions' => ['width' => '45'],
                                    'template' => '{view}',
                                    'buttons' => [
                                        'view' => function ($url, $data) {
                                            return Html::a('', ['qr/view', 'id' => $data->id], ['class' => 'fas fa-eye icon-eye-open',
                                                'style' => 'text-decoration:none',
                                                'data-original-title' => 'Просмотр QR-профиля',
                                                'data-toggle' => 'tooltip',
                                                'target' => '_blank',
                                                'data-pjax' => 0,
                                            ]);
                                        }
                                    ],
                                ],

                            ],
                        ]);
                        ?>
                    </div>
                </div>
                <?php Pjax::end() ?>
            </div>
        </div>
    </div>

</div>