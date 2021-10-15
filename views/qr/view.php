<?php

use Carbon\Carbon;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qr */

$this->title = 'QR-профиль №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Все QR-профили', 'url' => ['qr/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qr-view">
    <div class="row align-items-center">
        <div class="col-lg-6"><h1 style="text-shadow: 2px 2px 5px #00759C;">Данные QR-профиля №<?= $model->id ?></h1></div>
        <div class="col-lg-6 text-right">
            <p style="margin: 0">
                <?= Html::a('Вид QR-профиля <i class="fas fa-qrcode pl-2"></i>', ['profile', 'id' => $model->id], ['class' => 'btn btn-info', 'target' => '_blank']) ?>
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

<!-- row 1  -----------------------------------------------------------------------  -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; border: solid 2px #00759C; background-color: #f5f5f5; height:100%;">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <?php
                            if (!empty($model->qr_link)) {
                                echo Html::img(Yii::getAlias('@web') . '/images/qr-codes/' . $model->qr_link, ['width' => '350px',]);
                            } else {
                                echo '<div style="display:flex; align-items:center;">' .
                                     '<a class="btn btn-warning" data-pjax="0" target="_blank" href="https://api.qrserver.com/v1/create-qr-code/?size=800x800&format=svg&data=http://crm_project/qr/profile?id='. $model->id .'">Сгенерировать QR-КОД<i class="fas fa-qrcode pl-2"></i></a>' .
                                        Html::a('Загрузить изображение<i class="fas fa-file-upload pl-2"></i>', ['/qr/upload-qr', 'id' => $model->id], ['class' => 'btn btn-success', 'style' => 'margin-left: 20px;']) .
                                     '</div>';
                            }
                        ?>
                    </div>
                    <hr class="mt-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('profile_status_id') ?></b>
                            </h6>
                        </div>
                       <div class="col-sm-6 text-center">
                           <?= $model->profileQrStatus->name ?><i class="fas fa-star pl-2" aria-hidden="true" style="color: <?= $model->profileQrStatus->color ?>"></i>
                       </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('geolocation') ?></b>
                            </h6>
                        </div>
                       <div class="col-sm-6 text-center">
                           <?php if (!empty($model->geolocation)) { ?>
                                <a target="_blank" data-pjax="0" href="https://www.google.com.ua/maps/search/<?=$model->geolocation?>"><i class="fas fa-map-marker-alt" style="color: #ff7675; margin-right: 5px;"></i><?=$model->geolocation?></a>
                           <?php } else {
                                echo '-';
                           }
                           ?>
                       </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('comment') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-6 text-center">
                            <?= ($model->comment) ? $model->comment : '-' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; border: solid 2px #00759C; background-color: #f5f5f5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b>Ф.И.О</b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?= $model->getQrName() ?>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('bdate') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?= ($model->bdate) ? Carbon::parse($model->bdate)->format('d.m.Y') : '-' ?>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('date_death') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?= ($model->date_death) ? Carbon::parse($model->date_death)->format('d.m.Y') : '-' ?>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('country_born_id') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?= ($model->country_born_id) ? $model->getQrCountryOfBirthName() : '-' ?>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('city_born_id') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?= ($model->city_born_id) ? $model->getQrCityOfBirthName() : '-' ?>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('profession') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?= ($model->profession) ? $model->profession : '-' ?>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('hobby') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?= ($model->hobby) ? $model->hobby : '-' ?>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('last_wish') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?= ($model->last_wish) ? $model->last_wish : '-' ?>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('favourite_song') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?= ($model->last_wish) ? $model->favourite_song : '-' ?>
                        </div>
                    </div><hr>

                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">
                                <b><?= $model->getAttributeLabel('voice_message') ?></b>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <audio id="qrProfileAudio" controls src="<?= Yii::$app->request->baseUrl . '/audio/qr-voice-messages/' . $model->voice_message ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- row 2  -----------------------------------------------------------------------  -->
    <div class="row" style="margin-top: 20px; padding: 0 15px;">
        <div class="col-lg-12" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; margin-top: 10px; border: solid 2px #00759C; background-color: #f5f5f5; border-radius: 0.25rem;">
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 10px;">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" id="biography-tab" data-toggle="tab" href="#biography" role="tab" aria-controls="biography" aria-selected="false">Биография</a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" id="characteristic-tab" data-toggle="tab" href="#characteristic" role="tab" aria-controls="characteristic" aria-selected="false">Характеристика</a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" id="slider-tab" data-toggle="tab" href="#slider" role="tab" aria-controls="slider" aria-selected="true">Слайдер</a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" id="document-tab" data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="true">Документы</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent" style="margin-top: 10px; margin-bottom: 10px;">
                <div class="tab-pane fade active show text-justify" id="biography" role="tabpanel" aria-labelledby="biography-tab">
                    <?= ($model->biography) ? $model->biography : '-' ?>
                </div>
                <div class="tab-pane fade text-justify" id="characteristic" role="tabpanel" aria-labelledby="characteristic-tab">
                    <?= ($model->characteristic) ? $model->characteristic : '-' ?>
                </div>
                <div class="tab-pane fade" id="slider" role="tabpanel" aria-labelledby="slider-tab">
                    <?= $this->render('/qr/view-tabs/tab_sliders', [
                        'qr_id' => $model->id,
                        'modelSlider' => $modelSlider,
                        'sliderProvider' => $sliderProvider,
                        ]);
                    ?>
                </div>
                <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">Etsy mixtape wayfarers,
                    ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi
                    farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore
                    carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                    pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk
                    vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork
                    sustainable tofu synth chambray yr.
                </div>
            </div>
        </div>
    </div>

</div>
