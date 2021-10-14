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
                <div class="accordion show mt-1 mb-1" id="accordionClientMain" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
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
                                        <a href="/client/index"><button data-original-title="Список всех клиентов" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #00759C"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelClient->getCountClientsAllStatus() ?></span></button></a>
                                    </div>
                                </div><hr>
                                <?php $modelClient->getPrintClientStatusesBlock($modelClient->getClientStatuses(), $modelClient->getLastClientStatusIdInTable(), $modelClient) ?>
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
                <div class="accordion show mt-1 mb-1" id="accordionQrMain" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                    <div class="card" style="border: solid 4px #00759C;">
                        <div class="card-header" id="headingQrMain">
                            <div class="row">
                                <div class="col-lg-12 text-left font-weight-bold" style="width: 100%;" data-toggle="collapse" data-target="#collapseQrMain" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 style="margin: 0; font-weight: bold">
                                        Статусы QR-табличек
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
                                        <a href="/qr/index"><button data-original-title="Список всех QR-табличек" data-toggle="tooltip" data-placement="top" class="btn" style="width: 60%; background-color: #00759C"><span class="span font-weight-bold" style="color: #ffffff; font-size: 16px;"><?= $modelQr->getCountQrsAllStatus() ?></span></button></a>
                                    </div>
                                </div><hr>
                                <?php $modelQr->getPrintQrStatusesBlock($modelQr->getQrStatuses(), $modelQr->getLastQrStatusIdInTable(), $modelQr) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
