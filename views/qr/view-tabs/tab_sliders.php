<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<div class="row" style="margin-bottom: 10px;">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <a class="btn btn-info full btn-block" href="/qr/upload-slider-files?qr_id=<?=$qr_id?>">Загрузить<i class="fas fa-file-upload pl-2"></i></a>
    </div>
</div>

<?php Pjax::begin(['id' => 'pjaxQrSlider']); ?>
<div class="row">
    <div class="col-sm-12">
    <?=
    GridView::widget([
        'dataProvider' => $sliderProvider,
        //'filterModel' => $modelSlider,
        'columns' => [
            [
                'headerOptions' => ['width' => '50'],
                'attribute' => 'id',
                'content' => function ($data) {
                    return $data->id;
                },
            ],
            [
                'headerOptions' => ['width' => '50'],
                'attribute' => 'file_name',
                'content' => function ($data) {
                    return '<a target="_blank" data-pjax="0" href="'. \Yii::$app->request->getBaseUrl() . '/images/qr-sliders/qr-' . $data->qr_id . '/' . $data->file_name . '">' . $data->file_name . '</a>';
                },
            ],
        ]
    ]);
                        ?>
    </div>
</div>

<?php Pjax::end() ?>
