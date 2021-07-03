<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU', // TEST 10.06.21 "RU"
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'LQoUVzCCzdeGXlWGH1G2x4_I53ymVcPy',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'main/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
//                \kartik\datecontrol\Module::FORMAT_DATE => 'dd.MM.yyyy',
//                \kartik\datecontrol\Module::FORMAT_TIME => 'HH:mm:ss',
//                \kartik\datecontrol\Module::FORMAT_DATETIME => 'dd.MM.yyyy HH:mm:ss',
                \kartik\datecontrol\Module::FORMAT_DATE => 'php:d.m.Y',
                \kartik\datecontrol\Module::FORMAT_TIME => 'php:H:i',
                \kartik\datecontrol\Module::FORMAT_DATETIME => 'php:d-m-Y H:i',
            ],
            'saveSettings' => [
//                \kartik\datecontrol\Module::FORMAT_DATE => 'dd-MM-yyyy', // saves as unix timestamp
//                \kartik\datecontrol\Module::FORMAT_TIME => 'HH:mm:ss',
//                \kartik\datecontrol\Module::FORMAT_DATETIME => 'dd-MM-yyyy HH:mm:ss',
                \kartik\datecontrol\Module::FORMAT_DATE => 'php:Y-m-d', // saves as unix timestamp
                \kartik\datecontrol\Module::FORMAT_TIME => 'php:H:i:s',
                \kartik\datecontrol\Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],
        ],
    'params' => $params,
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
