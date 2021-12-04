<?php

namespace app\controllers;

use app\models\Qr;
use yii\rest\ActiveController;

class RestController extends ActiveController
{
    public $modelClass = Qr::class;

    // full info link: http://crm_project/rest?expand=qrSliders,profileQrStatus,qrCityOfBirth,qrCountryOfBirth

    public function behaviors() {
        return [
            [
                'class' => \yii\ filters\ ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\ web\ Response::FORMAT_JSON,
                ],
            ],
        ];
    }
}
