<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            //changed it by neil
            'dsn' => 'mysql:host=localhost;dbname=jdhnmember',
            'username' => 'root',
            //default pass for phpstudy mysql is root
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
