<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $form yii\widgets\ActiveForm */

?>

<div class="row panel panel-default">
    <div class="col-lg-12" style="background-color:#00759C; padding-left:3px; padding-right:3px;">
        <div class="accordion mt-1 mb-1" id="accordionClientsFilter">
            <div class="card">
                <div class="card-header" id="headingClientsFilter">
                    <div class="row">
                        <div class="col-lg-10 text-left font-weight-bold" style="padding-top: 5px; width: 100%;" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseOne">
                            <h3 style="margin: 0; font-weight: bold">
                                Фильтр
                                <span style="background-color: #d1d8e0; margin-left: 5px; font-size: 14px;!important; border-radius: 20px;">
                                    <?= $searchModelClientSearch->getFliterInfoSearch(); ?>
                                </span>
                            </h3>
                        </div>
                        <div class="col-lg-2 text-right">
                            <?= Html::a('Очистить фильтр <i class="fas fa-broom pl-2"></i>', ['index'], ['class' => 'btn btn-danger full',]) ?>
                        </div>
                    </div>
                </div>
                <div id="collapseFilter" class="collapse" aria-labelledby="headingClientsFilter" data-parent="#accordionClientsFilter">
                    <div class="card-body">
                        <?php $form = ActiveForm::begin([
                            'action' => ['index'],
                            'method' => 'get',
                        ]); ?>

                        <div class="client-search">
                            <label class="client-search-input-field">
                                <?= $searchModelClientSearch->getAttributeLabel('date_add_start') ?>
                            </label>
                            <div class="client-search-input-field">
                                <?= $form->field($searchModelClientSearch, 'date_add_start')->widget(DateControl::classname(), ['type' => DateControl::FORMAT_DATE])->label(false) ?>
                            </div>
                            <label class="client-search-input-field">
                                <?= $searchModelClientSearch->getAttributeLabel('date_add_end') ?>
                            </label>
                            <div class="client-search-input-field">
                                <?= $form->field($searchModelClientSearch, 'date_add_end')->widget(DateControl::classname(), ['type' => DateControl::FORMAT_DATE])->label(false) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo Html::submitButton('Поиск <i class="fas fa-search pl-2"></i>', ['class' => 'btn btn-info full btn-block']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
