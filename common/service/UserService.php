<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/16
 * Time: 15:08
 */

namespace common\service;

use Yii;
use common\models\User;

class UserService extends User
{
    public static function accessTokenIsValid($token){
        if (!$token){
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.accessTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * 生成 api_token
     * @param User $user
     */
    public static function generateAccessToken(User $user){
        $user->access_token = Yii::$app->security->generateRandomString() . '_' . time();
        $user->save(false);
    }
}