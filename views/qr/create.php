<?php

/* @var $this yii\web\View */
/* @var $model app\models\Qr */

use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Добавление нового QR-профиля';
$this->params['breadcrumbs'][] = ['label' => 'Все QR-профили', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qr-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
