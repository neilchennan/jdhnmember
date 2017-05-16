<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/16
 * Time: 22:36
 */

namespace common\models;

use Yii;

final class StatusCodeEnum
{
    private function __construct(){

    }
    const SUCCESS = 200;

    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405;
    const NOT_ACCEPTABLE  = 406;
    const TIMEOUT = 408;
    const GONE = 410;
    const UN_SUPPORT_MEDIA_TYPE = 415;

    const SERVER_ERROR = 500;

    protected static function MSG_STATUS_CODE_NOT_FOUND(){
        return Yii::t('app', 'Status Code Not Found');
    }

    public static function MSG_BY_STATUS_CODE($statusCode){
        $arr = [
            self::SUCCESS => Yii::t('app', 'Success 200'),
            self::BAD_REQUEST => Yii::t('app', 'Fail 400'),
            self::UNAUTHORIZED => Yii::t('app', 'Fail 401'),
            self::FORBIDDEN =>  Yii::t('app', 'Fail 403'),
            self::NOT_FOUND => Yii::t('app', 'Fail 404'),
            self::METHOD_NOT_ALLOWED =>  Yii::t('app', 'Fail 405'),
            self::NOT_ACCEPTABLE => Yii::t('app', 'Fail 406'),
            self::TIMEOUT => Yii::t('app', 'Fail 408'),
            self::GONE => Yii::t('app', 'Fail 410'),
            self::UN_SUPPORT_MEDIA_TYPE => Yii::t('app', 'Fail 415'),
        ];

        if (!isset($statusCode) || !isset($arr[$statusCode])){
            return self::MSG_STATUS_CODE_NOT_FOUND();
        }
        return $arr[$statusCode];
    }
}