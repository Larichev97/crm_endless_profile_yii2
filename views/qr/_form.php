<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Qr */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('../web/js/qr/qr.js');
?>
<?php $form = ActiveForm::begin([
    'id' => 'form-qr',
    'method' => 'post'
]); ?>

<div class="panel panel-default" style="padding: 15px 15px; background-color:#f5f5f5; border: solid 2px #00759C">
    <div class="row form-group form-group-sm">
        <label class="col-sm-2">
            <?= $model->getAttributeLabel('client_id') . ' ' . '*' ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'client_id')->textInput(['type' => 'number', 'step' => '1', 'placeholder' => 'Укажите номер клиента...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2">
            <?= $model->getAttributeLabel('first_name') . ' ' . '*' ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'Укажите имя...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('last_name') . ' ' . '*' ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Укажите фамилию...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('patronymic_name') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'patronymic_name')->textInput(['placeholder' => 'Укажите отчество...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm" id="block-bdate">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('bdate') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'bdate')
                ->widget(DateControl::classname(), ['type' => DateControl::FORMAT_DATE, 'options' => ['class' => 'form-control',]])
                ->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm" id="block-date_death">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('date_death') . ' ' . '*' ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'date_death')
                ->widget(DateControl::classname(), ['type' => DateControl::FORMAT_DATE, 'options' => ['class' => 'form-control',]])
                ->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('cause_of_death') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'cause_of_death')->textInput(['placeholder' => 'Укажите причину смерти...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm" id="block-country_born_id">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('country_born_id') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'country_born_id')
                ->dropDownList(\app\models\Qr::getQrCountrysOfBirthListItems(), ['prompt' => 'Укажите страну рождения...', 'id' => 'qr-country_born_id'])
                ->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm" id="block-city_born_id">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('city_born_id')?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'city_born_id')
                ->dropDownList(\app\models\Qr::getQrCityOfBirthListItems(), ['prompt' => 'Укажите город рождения...', 'id' => 'client-city_born_id'])
                ->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('profession') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'profession')->textInput(['placeholder' => 'Укажите профессию...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('hobby') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'hobby')->textarea(['placeholder' => 'Укажите увлечения (через знак ",")...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('biography') . ' ' . '*'  ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'biography')->textarea(['placeholder' => 'Укажите биографию...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('characteristic') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'characteristic')->textarea(['placeholder' => 'Укажите характеристику...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('last_wish') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'last_wish')->textarea(['placeholder' => 'Укажите последнее пожелание...'])->label(false) ?>
        </div>
    </div>
<!--    <div class="form-group form-group-sm" id="block-profile_status_id">-->
<!--        <label class="col-sm-3 control-label">-->
<!--            --><?php //= $model->getAttributeLabel('profile_status_id') . ' ' . '*'  ?>
<!--        </label>-->
<!--        <div class="col-sm-9">-->
<!--            --><?php //= $form->field($model, 'profile_status_id')
//                ->dropDownList(\app\models\Qr::getProfileQrStatusStatusListItems(), ['prompt' => 'Укажите статус профиля...', 'id' => 'qr-profile_status_id'])
//                ->label(false) ?>
<!--        </div>-->
<!--    </div>-->
    <div class="row form-group form-group-sm">
        <label class="col-sm-2">
            <?= $model->getAttributeLabel('favourite_song') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'favourite_song')->textInput(['placeholder' => 'Укажите любимую песню...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2">
            <?= $model->getAttributeLabel('other_link') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'other_link')->textInput(['placeholder' => 'Укажите ссылку...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('comment') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'comment')->textarea(['placeholder' => 'Комментарий агента...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <div class="col-sm-12">
            <?= Html::submitButton('Сохранить <i class="fas fa-save pl-2"></i>', ['class' => 'btn btn-info full btn-block']) ?>
        </div>
    </div>
</div>

<?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'date_update')->hiddenInput()->label(false) ?>
<!-- СТАТУС ПРОФИЛЯ "Default" (создать доп. таблицу статусов профиля) -->
<?= $form->field($model, 'profile_status_id')->hiddenInput()->label(false) ?>

<?php ActiveForm::end(); ?>