<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    //localization by Neil
//    'language'=>'zh-CN',

    'components' => [
        'request' => [
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
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        //modified by Neil,开启url优化
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
            ],
        ],
        //localization by Neil
//        'i18n' => [
//            'translations' => [
//                'common' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
////                    'basePath' => '@common/messages',
//                    'fileMap' => [
//                        'common' => 'common.php',
//                        'app' => 'app.php',
//                    ],
//                ],
//            ],
//        ],
    ],
    'params' => $params,

    //added by Neil
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',//yii2-admin的导航菜单
        ],
    ],

    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',//允许所有人访问 site 节点及其子节点
            'admin/*',//允许所有人访问 admin 节点及其子节点
            'gii/*',//允许所有人访问 gii 节点及其子节点
            'qrxq2017-enroll/*',
            'huxuan/*',
            'customer/*',
        ]
    ],
];
