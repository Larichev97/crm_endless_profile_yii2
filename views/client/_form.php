<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('../web/js/client/client.js');
?>
<?php $form = ActiveForm::begin([
    'id' => 'form-client',
    'method' => 'post'
]); ?>



<div class="panel panel-default" style="padding: 15px 15px; background-color:#f5f5f5; border: solid 2px #00759C">
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
            <?= $model->getAttributeLabel('last_name') ?>
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
<!--                <div class="form-group form-group-sm" id="block-country_id">-->
<!--                    <label class="col-sm-3 control-label">-->
<!--                        --><?php //= $model->getAttributeLabel('country_id') ?>
<!--                    </label>-->
<!--                    <div class="col-sm-9">-->
<!--                        --><?php //= $form->field($model, 'country_id')
//                            ->dropDownList(\app\models\Client::getClientCountriesListItems(), ['prompt' => 'Укажите страну...', 'id' => 'client-country_id'])
//                            ->label(false) ?>
<!--                    </div>-->
<!--                </div>-->
    <div class="row form-group form-group-sm">
        <label class="col-sm-2">
            <?= $model->getAttributeLabel('phone_number') . ' ' . '*' ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'phone_number')->textInput(['type' => 'tel','placeholder' => 'Укажите номер телефона...', 'minlength' => '10', 'maxlength' => '13'])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm">
        <label class="col-sm-2">
            <?= $model->getAttributeLabel('email')?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'email')->textInput(['type' => 'email','placeholder' => 'Укажите E-mail...',])->label(false) ?>
        </div>
    </div>
    <div class="row form-group form-group-sm" id="block-city_id">
        <label class="col-sm-2 control-label">
            <?= $model->getAttributeLabel('city_id') . ' ' . '*' ?>
        </label>
        <div class="col-sm-10">
            <?= $form->field($model, 'city_id')
                ->dropDownList(\app\models\Client::getClientCitiesUAListItems(), ['prompt' => 'Укажите город...', 'id' => 'client-city_id'])
                ->label(false) ?>
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
<?= $form->field($model, 'country_id')->hiddenInput()->label(false) ?> <!-- Only Ukraine (id=1) -->

<?php ActiveForm::end(); ?>

