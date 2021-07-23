<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Qr */
/* @var $form yii\widgets\ActiveForm */

AppAsset::register($this);

$this->title = 'Загрузка изображения QR-кода';
$this->params['breadcrumbs'][] = ['label' => 'Все QR-профили', 'url' => ['qr/index']];
$this->params['breadcrumbs'][] = ['label' => 'QR-профиль №' . $model->id, 'url' => ['qr/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="qr-upload">

<?php $form = ActiveForm::begin([
    'id' => 'form-upload-qr',
    'method' => 'post',
    'options' => [
        'enctype' => 'multipart/form-data'
    ]

]); ?>

<div class="panel panel-default" style="padding: 15px 15px; background-color:#f5f5f5; border: solid 2px #00759C">
    <div class="row form-group form-group-sm">
        <label class="col-sm-2">
            <b><?= $model->getAttributeLabel('qr_link') ?></b>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'qr_link')->fileInput()->label(false) ?>
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