<?php

use Carbon\Carbon;

/* @var $this yii\web\View */
/* @var $model app\models\Qr */

$this->title = 'QR-профиль №' . $model->id;

?>
<!-- MOBILE VIEW (REDIRECT FROM QR-CODE) -->

<div class="qr-profile">
    <div class="row mt-2">
        <div class="col-sm-12 text-center"><h2 id="qrProfileText" style="font-size: 19px;"><b><?= $model->last_name . ' ' . $model->first_name . ' ' . $model->patronymic_name ?></b></h2></div>
    </div>
    <div class="d-flex flex-column align-items-center" style="width: 300px; height: 300px; position: relative; overflow: hidden; border-radius: 50%; border: solid 4px #00759C; margin:0 auto;">
        <?php
            if (!empty($model->photo_link)) {
                echo  '<img src="' . Yii::getAlias('@web').'/images/qr-avatars/' . $model->photo_link . '" alt="Фото" class="rounded-circle" style="display:inline; margin:0 auto; margin-left: -25%; height: 100%; width: auto;">';
            } else {
                echo  '<img src="' . Yii::getAlias('@web').'/images/default_qr_profile_photo.png" alt="Фото" class="rounded-circle" style="display:inline; margin:0 auto; margin-left: -25%; height: 100%; width: auto;">';
            }
        ?>
    </div>

<!--  1 BLOCK  -->
    <div class="row mt-3">
        <div class="col-sm-12 text-center text-uppercase"><h2 id="qrProfileHeader" style="font-size: 19px;"><b>Основное</b></h2><hr style="margin: 2px 100px 10px 100px; background-color: #000000; height: 2px;"></div>
    </div>
    <div class="card mt-1" style="border: solid 2px #00759C; background-color: #f5f5f5">
        <div class="card-body  align-text-center">
            <div class="row align-items-center" style="flex-wrap: nowrap">
                <div class="col-sm-3">
                    <h3 style="font-size: 14px; margin: 0;">
                        <b><?= $model->getAttributeLabel('bdate') ?></b>
                    </h3>
                </div>
                <div class="col-sm-9 text-secondary">
                    <?= ($model->bdate) ? Carbon::parse($model->bdate)->format('d.m.Y') : '-'; ?>
                </div>
            </div><hr style="margin:5px 0 5px 0;">

            <div class="row align-items-center" style="flex-wrap: nowrap">
                <div class="col-sm-3">
                    <h3 style="font-size: 14px; margin: 0;">
                        <b><?= $model->getAttributeLabel('date_death') ?></b>
                    </h3>
                </div>
                <div class="col-sm-9 text-secondary">
                    <?= ($model->date_death) ? Carbon::parse($model->date_death)->format('d.m.Y') : '-'; ?>
                </div>
            </div><hr style="margin:5px 0 5px 0;">

            <?php if ((!empty($model->bdate)) && (!empty($model->date_death))) { ?>
            <div class="row align-items-center" style="flex-wrap: nowrap">
                <div class="col-sm-3">
                    <h3 style="font-size: 14px; margin: 0;">
                        <b>Полных лет</b>
                    </h3>
                </div>
                <div class="col-sm-9 text-secondary">
                    <?= $years = Carbon::parse($model->date_death)->format('Y') - Carbon::parse($model->bdate)->format('Y') ?>
                </div>
            </div><hr style="margin:5px 0 5px 0;">
            <?php } ?>


            <?php if (!empty($model->cause_of_death)) { ?>
            <div class="row align-items-center" style="flex-wrap: nowrap">
                <div class="col-sm-3">
                    <h3 style="font-size: 14px; margin: 0;">
                        <b><?= $model->getAttributeLabel('cause_of_death') ?></b>
                    </h3>
                </div>
                <div class="col-sm-9 text-secondary">
                    <?= $model->cause_of_death ?>
                </div>
            </div><hr style="margin:5px 0 5px 0;">
            <?php } ?>

            <div class="row align-items-center" style="flex-wrap: nowrap">
                <div class="col-sm-3">
                    <h3 style="font-size: 14px; margin: 0;">
                        <b><?= $model->getAttributeLabel('country_born_id') ?></b>
                    </h3>
                </div>
                <div class="col-sm-9 text-secondary">
                    <?= ($model->country_born_id) ? $model->getQrCountryOfBirthName() : '-' ?>
                </div>
            </div><hr style="margin:5px 0 5px 0;">

            <div class="row align-items-center" style="flex-wrap: nowrap">
                <div class="col-sm-3">
                    <h3 style="font-size: 14px; margin: 0;">
                        <b><?= $model->getAttributeLabel('city_born_id') ?></b>
                    </h3>
                </div>
                <div class="col-sm-9 text-secondary">
                    <?= ($model->city_born_id) ? $model->getQrCityOfBirthName() : '-' ?>
                </div>
            </div><hr style="margin:5px 0 5px 0;">

            <div class="row align-items-center" style="flex-wrap: nowrap">
                <div class="col-sm-3">
                    <h3 style="font-size: 14px; margin: 0;">
                        <b><?= $model->getAttributeLabel('profession') ?></b>
                    </h3>
                </div>
                <div class="col-sm-9 text-secondary">
                    <?= ($model->profession) ? $model->profession : '-' ?>
                </div>
            </div><hr style="margin:5px 0 5px 0;">

            <div class="row align-items-center" style="flex-wrap: nowrap">
                <div class="col-sm-3">
                    <h3 style="font-size: 14px; margin: 0;">
                        <b><?= $model->getAttributeLabel('hobby') ?></b>
                    </h3>
                </div>
                <div class="col-sm-9 text-secondary">
                    <?= ($model->hobby) ? $model->hobby : '-' ?>
                </div>
            </div><hr style="margin:5px 0 5px 0;">

            <?php if ($model->favourite_song) { ?>
                <div class="row align-items-center" style="flex-wrap: nowrap">
                    <div class="col-sm-12">
                        <h3 style="font-size: 14px; margin: 0;">
                            <b><?= $model->getAttributeLabel('favourite_song') ?></b> :
                        </h3>
                    </div>
                </div>
                <div class="row align-items-center mt-2" style="flex-wrap: nowrap">
                    <div class="col-sm-12 text-secondary">
                        <?= ($model->favourite_song) ? $model->favourite_song : '-'; ?>
                    </div>
                </div>

                <div class="row align-items-center text-center" style="flex-wrap: nowrap; margin-top: 5px;">
                    <div class="col-sm-6">
                        <a target="_blank" data-pjax="0" href="https://music.youtube.com/search?q=' . $model->favourite_song . '"><i class="fab fa-youtube" style="color: #FF0000"></i> YouTube Music</a>
                    </div>
                    <div class="col-sm-6">
                        <a target="_blank" data-pjax="0" href="https://open.spotify.com/search/' . $model->favourite_song . '"><i class="fab fa-spotify" style="color: #1DB954; background-color: #000000"></i> Spotify</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<!--  2 BLOCK  -->
    <?php if ($model->biography) { ?>
        <div class="row mt-3">
            <div class="col-sm-12 text-center text-uppercase"><h2 id="qrProfileHeader" style="font-size: 19px;"><b><?= $model->getAttributeLabel('biography') ?></b></h2><hr style="margin: 2px 100px 10px 100px; background-color: #000000; height: 2px;"></div>
        </div>
        <div class="card mt-1" style="border: solid 2px #00759C; background-color: #f5f5f5">
            <div class="card-body  align-text-center">
                <div class="row align-items-center" style="flex-wrap: nowrap">
                    <div class="col-sm-12" style="color: #000000; text-align: justify;">
                        <p id="qrProfileText"><?= $model->biography ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<!--  3 BLOCK  -->
    <?php if ($model->characteristic) { ?>
        <div class="row mt-3">
            <div class="col-sm-12 text-center text-uppercase"><h2 id="qrProfileHeader" style="font-size: 19px;"><b><?= $model->getAttributeLabel('characteristic') ?></b></h2><hr style="margin: 2px 100px 10px 100px; background-color: #000000; height: 2px;"></div>
        </div>
        <div class="card mt-1" style="border: solid 2px #00759C; background-color: #f5f5f5">
            <div class="card-body  align-text-center">
                <div class="row align-items-center" style="flex-wrap: nowrap">
                    <div class="col-sm-12" style="color: #000000; text-align: justify;">
                        <p id="qrProfileText"><?= $model->characteristic ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<!--  4 BLOCK (TEXT / Audio with button "Play" / Video player) -->
    <?php if ($model->last_wish) { ?>
        <div class="row mt-3">
            <div class="col-sm-12 text-center text-uppercase"><h2 id="qrProfileHeader" style="font-size: 19px;"><b><?= $model->getAttributeLabel('last_wish') ?></b></h2><hr style="margin: 2px 100px 10px 100px; background-color: #000000; height: 2px;"></div>
        </div>
        <div class="card mt-1" style="border: solid 2px #00759C; background-color: #f5f5f5">
            <div class="card-body  align-text-center">
                <div class="row align-items-center" style="flex-wrap: nowrap">
                    <div class="col-sm-12" style="color: #000000; text-align: justify;">
                        <p id="qrProfileText"><?= $model->last_wish ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<!--  5 BLOCK  (SLIDER) -->
<div class="row mt-3">
    <div class="col-sm-12 text-center text-uppercase"><h2 id="qrProfileHeader" style="font-size: 19px;"><b>Галерея</b></h2><hr style="margin: 2px 100px 10px 100px; background-color: #000000; height: 2px;"></div>
</div>
<div class="carousel slide mt-2" id="carouselExampleIndicators" data-ride="carousel" style="border: solid 2px #00759C; background-color: #f5f5f5">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="d-block w-100" alt="Фото №1">
        </div>
        <div class="carousel-item">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="d-block w-100" alt="Фото №2">
        </div>
        <div class="carousel-item">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="d-block w-100" alt="Фото №3">
        </div>
    </div>
    <a href="#carouselExampleIndicators" class="carousel-control-prev" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Назад</span>
    </a>
    <a href="#carouselExampleIndicators" class="carousel-control-next" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Вперёд</span>
    </a>
</div>
<!--  ----------------- -->
</div>
