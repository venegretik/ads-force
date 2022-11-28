<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' =>
            [
                //['class' => 'frontend\components\ClassUrlRule'],
                '' => 'site/index',
                'profile-performer' => 'profile-performer/index',
                'profile-customer' => 'profile-customer/index',
                'for-customer' => 'site/for-customer',
                'tasks' => 'site/tasks',
                'task-page/<id:>' => 'site/task-page',
                'why-we' => 'site/why-we',
                'performers-catalog' => 'site/performers-catalog',
                'performers-page' => 'site/performers-page',
                'profile-customer/profile-news-private/<link:>' => 'profile-customer/profile-news-private',
                'profile-customer/technical-support-chat/<link:>' => 'profile-customer/technical-support-chat',
                'profile-performer/technical-support-chat/<link:>' => 'profile-performer/technical-support-chat',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];
