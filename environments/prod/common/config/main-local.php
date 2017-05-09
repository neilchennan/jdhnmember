<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            //changed it by neil
            'dsn' => 'mysql:host=5657f5395d07d.sh.cdb.myqcloud.com:4833;dbname=jdhnmember',
            'username' => 'root',
            //default pass for phpstudy mysql is root
            'password' => 'Nihao1111',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => 'deer_love@163.com',
                'password' => 'Love1234',
                'port' => '994',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['service@jdhn.com'=>'admin'],
            ],
        ],
    ],
];