<?php

use Carbon\Carbon;

use yii\bootstrap4\Breadcrumbs;

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Все клиенты';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('../web/js/client/client.js');

?>

<?php
    Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>

<?php Pjax::begin(['id' => 'pjaxClient']); ?>

<?php echo $this->render('_search', ['searchModelClientSearch' => $searchModelClientSearch, 'clientSearchProvider' => $clientSearchProvider]); ?>

<?php

?>
<div class="row panel panel-default">
    <div class="col-lg-12" style="background-color:#00759C; padding-left:3px; padding-right:3px;">
        <div class="accordion show mt-1 mb-1" id="accordionClients">
            <div class="card">
                <div class="card-header" id="headingClients">
                    <div class="row">
                        <div class="col-lg-10 text-left font-weight-bold" style="padding-top: 5px; width: 100%;" data-toggle="collapse" data-target="#collapseClients" aria-expanded="true" aria-controls="collapseOne">
                            <h3 style="margin: 0; font-weight: bold">
                                Все клиенты
                            </h3>
                        </div>
                        <div class="col-lg-2 text-right">
                            <?= \yii\helpers\Html::a('Добавить клиента <i class="fas fa-user-plus pl-2"></i>', ['create'], ['class' => 'btn btn-success stop-event', 'data-original-title' => 'Добавить нового клиента', 'data-toggle' => 'tooltip', 'data-placement' => 'top',]) ?>
                        </div>
                    </div>
                </div>

                <div id="collapseClients" class="collapse show" aria-labelledby="headingClients" data-parent="#accordionClients">
                    <div class="card-body">
                        <?=
                        GridView::widget([
                            'dataProvider' => $clientSearchProvider,
                            'filterModel' => $searchModelClientSearch,
                            'columns' => [
                                [
                                    'headerOptions' => ['width' => '50'],
                                    'attribute' => 'id',
                                    'content' => function ($data) {
                                        return '<a target="_blank" data-pjax="0" href="/client/view?id=' . $data->id . '">' . $data->id . '</a>';
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '220'],
                                    'label' => 'Ф.И.О',
                                    'filter' => false,
                                    'content' => function ($data) {
                                        return $data->getClientName();
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '85'],
                                    'attribute' => 'bdate',
                                    'filter' => false,
                                    'content' => function ($data) {
                                        return ($data->bdate) ? Carbon::parse($data->bdate)->format('d.m.Y') : '-';
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '130'],
                                    'attribute' => 'status_id',
                                    'filter' => \app\models\Client::getClientStatusListItems(),
                                    'filterInputOptions' => [
                                        'class' => 'form-control',
                                        'prompt' => 'Выберите...',
                                    ],
                                    'content' => function ($data) {
                                        return $data->getClientStatusName() . '<i class="fas fa-star pull-right" aria-hidden="true" style="color:' . $data->clientStatus->color . ';"></i>';
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '80'],
                                    'attribute' => 'country_id',
                                    //'filter' => \app\models\Client::getClientCountriesListItems(),
                                    'filter' => false,
                                    'content' => function ($data) {
                                        return ($data->country_id) ? $data->getClientCountryName() : '-';
                                    },
                                ],
                                [
                                    'headerOptions' => ['width' => '130'],
                                    'attribute' => 'city_id',
                                    'filter' => \app\models\Client::getClientCitiesUAListItems(),
                                    'filterInputOptions' => [
                                        'class' => 'form-control',
                                        'prompt' => 'Выберите...',
                                    ],
                                    'content' => function ($data) {
                                        return ($data->city_id) ? $data->getClientCityName() : '-';
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
                                    'template' => '{view} {update}',
                                    'buttons' => [
                                        'view' => function ($url, $model) {
                                            return Html::a('', ['/client/view', 'id' => $model->id], ['class' => 'fas fa-eye icon-eye-open',
                                                'style' => 'text-decoration:none',
                                                'data-original-title' => 'Просмотр профиля клиента',
                                                'data-toggle' => 'tooltip',
                                            ]);
                                        },
                                        'update' => function ($url, $model) {
                                            return Html::a('', ['/client/update', 'id' => $model->id], ['class' => 'glyphicon glyphicon-pencil',
                                                'style' => 'text-decoration:none',
                                                'data-original-title' => 'Редактировать',
                                                'data-toggle' => 'tooltip',
                                            ]);
                                        },
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