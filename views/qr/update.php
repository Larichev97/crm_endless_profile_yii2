<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qr */

use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Редактирование QR-профиля №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Главная', 'url' => ['main']];
$this->params['breadcrumbs'][] = ['label' => 'Все QR-профили', 'url' => ['qr/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
