<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/16
 * Time: 10:25
 */
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
return [
//    'name' => 'API接口v1.0',
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
//    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => false, // API change to false
            'enableAutoLogin' => true,
            'enableSession' => false,  // API ++
            'loginUrl' => null // API ++
        ],
        //url优化
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/huxuans',
                        'v1/sites',
                    ],
                    'pluralize' => true,
                ],
            ],
        ],
    ],
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
];