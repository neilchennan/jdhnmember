<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    //localization by Neil
    'language'=>'zh-CN',


    'components' => [
        //added by Neil, change date format
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
//            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'CNY',
        ],
        //added finish
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        //mdm admin by neil
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // 使用数据库管理配置文件
        ],

        //localization by Neil
        'i18n' => [
            'translations' => [
                'common' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'common' => 'common.php',
                    ],
                ],
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
    ],
];
