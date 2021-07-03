<?php

/* @var $this yii\web\View */
/* @var $model app\models\Client */

use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Добавление нового клиента';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['client/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="client-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>