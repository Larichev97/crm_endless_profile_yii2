<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => Yii::$app->name,
        'brandLabel' => 'Remember',
        'brandUrl' => '/main/',
        'options' => [
            //'class' => 'navbar-dark bg-dark navbar-expand-lg',    //new b4  15.06.21
                //'class' => 'navbar-dark bg-dark navbar-expand-lg flex-column flex-md-row',    //new b4
                'class' => 'navbar-dark bg-dark navbar-expand-lg',    //new b4  15.06.21
        ],
    ]);
    echo Nav::widget([
        //'options' => ['class' => 'navbar-nav navbar-right'],
        'options' => ['class' => 'navbar-nav ml-auto navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/main/index'],],
            ['label' => 'Клиенты', 'url' => ['/client/index']],
            ['label' => 'QR-профили', 'url' => ['/qr/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/main/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/main/logout'], 'post')
                . Html::submitButton(
                    'Выйти <i class="fas fa-sign-out-alt pl-2"></i>',
                    //['class' => 'btn btn-sm btn-info logout', 'style' => 'padding:9px;'] // old
                    //['class' => 'btn btn-info navbar-btn btn-sm', 'style' => 'margin-top:5px;'] // было 15.06.21
                    ['class' => 'btn btn-info navbar-btn btn-sm']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Larichev D. <?= date('Y') ?></p>

<!--        <p class="pull-right">--><?php //= Yii::powered() ?><!--</p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
