<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/4
 * Time: 11:26
 */

namespace common\helper;


class JdhnCommonHelper
{
    public static function createGuid()
    {
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            $str = md5(uniqid(mt_rand(), true));
            $uuid  = substr($str,0,8) . '-';
            $uuid .= substr($str,8,4) . '-';
            $uuid .= substr($str,12,4) . '-';
            $uuid .= substr($str,16,4) . '-';
            $uuid .= substr($str,20,12);
            return $uuid;
        }
    }
}