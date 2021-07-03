<?php

/* @var $this yii\web\View */

$this->title = 'Панель управления';
?>
<!-- 1 ROW -->
<div class="row panel panel-default mt-2 mb-5 text-center">
    <div class="col-lg-12">
        <h1 style="font-weight: bold;">ПАНЕЛЬ УПРАВЛЕНИЯ</h1>
    </div>
</div>
<!-- 2 ROW -->
<div class="row panel panel-default mt-2 mb-5">
    <div class="col-lg-6">
        <?= \yii\helpers\Html::a('Добавить клиента <i class="fas fa-user-plus pl-2"></i>', ['client/create'], ['class' => 'btn btn-success stop-event full btn-block', 'data-original-title' => 'Добавить нового клиента', 'data-toggle' => 'tooltip', 'data-placement' => 'top',]) ?>
    </div>
    <div class="col-lg-6">
        <?= \yii\helpers\Html::a('Добавить QR <i class="fas fa-qrcode pl-2"></i>', ['qr/create'], ['class' => 'btn btn-success stop-event full btn-block', 'data-original-title' => 'Добавить информацию для нового QR-профиля', 'data-toggle' => 'tooltip', 'data-placement' => 'top',]) ?>
    </div>
</div>
<!-- 3 ROW -->
<div class="row">
    <div class="col-lg-6" style="padding-left: 15px; padding-right: 15px;">
        <div class="row panel panel-default">
            <div class="col-lg-12">
                <div class="accordion show mt-1 mb-1" id="accordionClientMain">
                    <div class="card" style="border: solid 4px #00759C;">
                        <div class="card-header" id="headingClientMain">
                            <div class="row">
                                <div class="col-lg-12 text-left font-weight-bold" style="width: 100%;" data-toggle="collapse" data-target="#collapseClientMain" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 style="margin: 0; font-weight: bold">
                                        Статусы клиентов
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div id="collapseClientMain" class="collapse show" aria-labelledby="headingClientMain" data-parent="#accordionClientMain">
                            <div class="card-body">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        Все
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/client/index"><button data-original-title="Список всех клиентов" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #00759C"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelClient->getCountClientsAllStatus() ?></span></button></a>
                                    </div>
                                </div><hr>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        Новые
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/client/index?ClientSearch[status_id]=1"><button data-original-title="Список новых клиентов" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #9c88ff"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelClient->getCountClientsStatus(1) ?></span></button></a>
                                    </div>
                                </div><hr>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        Активные
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/client/index?ClientSearch[status_id]=2"><button data-original-title="Список активных клиентов" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #4cd137"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelClient->getCountClientsStatus(2) ?></span></button></a>
                                    </div>
                                </div><hr>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        Замороженные
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/client/index?ClientSearch[status_id]=3"><button data-original-title="Список приостановленных клиентов" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #0097e6"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelClient->getCountClientsStatus(3) ?></span></button></a>
                                    </div>
                                </div><hr>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        Отмененные
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/client/index?ClientSearch[status_id]=4"><button data-original-title="Список отмененных клиентов" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #eb2f06"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelClient->getCountClientsStatus(4) ?></span></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6" style="padding-left: 15px; padding-right: 15px;">
        <div class="row panel panel-default">
            <div class="col-lg-12">
                <div class="accordion show mt-1 mb-1" id="accordionQrMain">
                    <div class="card" style="border: solid 4px #00759C;">
                        <div class="card-header" id="headingQrMain">
                            <div class="row">
                                <div class="col-lg-12 text-left font-weight-bold" style="width: 100%;" data-toggle="collapse" data-target="#collapseQrMain" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 style="margin: 0; font-weight: bold">
                                        Статусы QR-профилей
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div id="collapseQrMain" class="collapse show" aria-labelledby="headingQrMain" data-parent="#accordionQrMain">
                            <div class="card-body">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        Все
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/qr/index"><button data-original-title="Список всех QR-профилей" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #00759C"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelQr->getCountQrsAllStatus() ?></span></button></a>
                                    </div>
                                </div><hr>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        Новые
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/qr/index?QrSearch[profile_status_id]=1"><button data-original-title="Список новых QR-профилей" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #9c88ff"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelQr->getCountQrsStatus(1) ?></span></button></a>
                                    </div>
                                </div><hr>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        У клиента
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/qr/index?QrSearch[profile_status_id]=3"><button data-original-title="Список QR-профилей, которые находится у клиентов" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #4cd137"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelQr->getCountQrsStatus(3) ?></span></button></a>
                                    </div>
                                </div><hr>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        Создаются
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/qr/index?QrSearch[profile_status_id]=2"><button data-original-title="Список QR-профилей, которые создаются" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #fbc531"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelQr->getCountQrsStatus(2) ?></span></button></a>
                                    </div>
                                </div><hr>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8">
                                        Потерянные
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <a target="_blank" href="/qr/index?QrSearch[profile_status_id]=4"><button data-original-title="Список потерянных QR-профилей" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #eb2f06"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelQr->getCountQrsStatus(4) ?></span></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!--<div class="site-index">-->
<!---->
<!--    <div class="jumbotron">-->
<!--        <h1>Congratulations!</h1>-->
<!---->
<!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
<!---->
<!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
<!--    </div>-->
<!---->
<!--    <div class="body-content">-->
<!---->
<!--        <div class="row">-->
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
<!--            </div>-->
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
<!--            </div>-->
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->
