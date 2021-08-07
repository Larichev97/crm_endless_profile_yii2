<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Qr */
/* @var $form yii\widgets\ActiveForm */

//$this->registerJsFile('../web/js/qr/qr.js');
?>
<?php $form = ActiveForm::begin([
    'id' => 'form-qr',
    'method' => 'post',
    'options' => [
    'enctype' => 'multipart/form-data'
]
]); ?>

<div class="panel panel-default" style="padding: 15px 15px; background-color:#f5f5f5; border: solid 2px #00759C">
    <?php if (Yii::$app->controller->action->id == 'update') : ?>
        <div class="row form-group form-group-sm">
            <label class="col-sm-2">
                <?= $model->getAttributeLabel('profile_status_id') ?>
            </label>
            <div class="col-sm-10">
                <?= $form->field($model, 'profile_status_id')
                    ->dropDownList(\app\models\Qr::getProfileQrStatusListItems(), ['prompt' => 'Укажите статус QR-профиля...', 'id' => 'qr-profile_status_id'])
                    ->label(false) ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2">
            <?= $model->getAttributeLabel('client_id') . ' ' . '<i class="fas fa-asterisk" style="color: #d63031"></i>' ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'client_id')->textInput(['type' => 'number', 'step' => '1', 'placeholder' => 'Укажите ID клиента, который заказывает табличку...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2">
            <?= $model->getAttributeLabel('first_name') . ' ' . '<i class="fas fa-asterisk" style="color: #d63031"></i>' ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'Укажите имя...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('last_name') . ' ' . '<i class="fas fa-asterisk" style="color: #d63031"></i>' ?>
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
            <?= $model->getAttributeLabel('date_death') . ' ' . '<i class="fas fa-asterisk" style="color: #d63031"></i>' ?>
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
            <?= $model->getAttributeLabel('biography') . ' ' . '<i class="fas fa-asterisk" style="color: #d63031"></i>'  ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'biography')->textarea(['placeholder' => 'Укажите биографию...', 'rows' => 20])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('characteristic') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'characteristic')->textarea(['placeholder' => 'Укажите характеристику...', 'rows' => 20])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('last_wish') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'last_wish')->textarea(['placeholder' => 'Укажите последнее пожелание...', 'rows' => 5])->label(false) ?>
        </div>
    </div>
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
        <label class="col-sm-2">
            <?= $model->getAttributeLabel('geolocation') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'geolocation')->textInput(['placeholder' => 'Укажите геолокацию таблички на месте установки (00.000000, 00.000000) ...'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <b><?= $model->getAttributeLabel('voice_message') ?></b>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'voice_message')->fileInput()->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('comment') ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'comment')->textarea(['placeholder' => 'Комментарий агента...', 'rows' => 4])->label(false) ?>
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

<?php ActiveForm::end(); ?>