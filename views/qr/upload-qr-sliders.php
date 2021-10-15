<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

AppAsset::register($this);

$this->title = 'Загрузка изображений слайдера для QR-профиля №' . $qr_id;
$this->params['breadcrumbs'][] = ['label' => 'QR-профиль №' . $qr_id, 'url' => ['qr/view', 'id' => $qr_id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="qr-upload-slider-images">

    <?php $form = ActiveForm::begin([
        'id' => 'form-upload-qr-sliders',
        'method' => 'post',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]

    ]); ?>

    <div class="panel panel-default" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; padding: 15px 15px; background-color:#f5f5f5; border: solid 2px #00759C; border-radius: 0.25rem;">
        <div class="row form-group form-group-sm">
            <label class="col-sm-2">
                <b><?= $modelQrSliders->getAttributeLabel('imageFiles') ?></b>
            </label>
            <div class="col-sm-10">
                <?= $form->field($modelQrSliders, 'imageFiles[]')->fileInput([
                        'multiple'=>true,
                    ]
                )->label(false) ?>
            </div>
        </div>

        <div class="row form-group form-group-sm">
            <div class="col-sm-12">
                <?= Html::submitButton('Сохранить <i class="fas fa-save pl-2"></i>', ['class' => 'btn btn-info full btn-block']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>