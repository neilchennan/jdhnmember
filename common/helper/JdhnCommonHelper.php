<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/4
 * Time: 11:26
 */

namespace common\helper;

use common\models\CommonEnum;
use Yii;

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

    //region 我选谁谁选我
    public static function getHuxuanFromTo_map(){
        return [
            CommonEnum::HUXUAN_TO => Yii::t('app', 'Query Huxuan To'),
            CommonEnum::HUXUAN_FROM => Yii::t('app', 'Query Huxuan From'),
        ];
    }
    public static function getHuxuanFromToByIntValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        return JdhnCommonHelper::getHuxuanFromTo_map()[$intValue];
    }
    //endregion

    //region 数字和罗马数字的转换
    public static function getRomaNumber_map(){
        return [
            1 => CommonEnum::ROMA_FIRST,
            2 => CommonEnum::ROMA_SECOND,
            3 => CommonEnum::ROMA_THIRD,
        ];
    }
    public static function getRomaNumberByIntValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        return JdhnCommonHelper::getRomaNumber_map()[$intValue];
    }
    //endregion

    //region 性别int和string值互换查询
    public static function getGender_map(){
        return [
            1 => Yii::t('app', 'Male'),
            2 => Yii::t('app', 'Female'),
        ];
    }
    public static function getGender_reverse_map(){
        return [
            Yii::t('app', 'Male') => 1,
            Yii::t('app', 'Female') => 2,
        ];
    }
    public static function getGenderByIntValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        return JdhnCommonHelper::getGender_map()[$intValue];
    }
    public static function getGenderByStrValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        return JdhnCommonHelper::getGender_reverse_map()[$intValue];
    }
    //endregion

    //region 报名者身份int和string值互换查询
    public static function getApplicationRole_map(){
        return [
            0 => Yii::t('app', 'Volunteer'),
            1 => Yii::t('app', 'Male Customer'),
            2 => Yii::t('app', 'Female Customer'),
        ];
    }
    public static function getApplicationRole_reverse_map(){
        return [
            Yii::t('app', 'Volunteer')  => 0,
            Yii::t('app', 'Male Customer') => 1,
            Yii::t('app', 'Female Customer') => 2,
        ];
    }
    public static function getApplicantRoleByIntValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        return JdhnCommonHelper::getApplicationRole_map()[$intValue];
    }
    public static function getApplicantRoleByStrValue($inputVal){
        if (!isset($inputVal) || empty($inputVal)){
            return null;
        }
        return JdhnCommonHelper::getApplicationRole_reverse_map()[$inputVal];
    }
    //endregion

    //region 最高学历int和string值互换查询
    public static function getHighestDegree_map(){
        return [
            1 => Yii::t('app', 'Doctor'),
            2 => Yii::t('app', 'Master'),
            3 => Yii::t('app', 'Bachelor'),
        ];
    }
    public static function getHighestDegree_reverse_map(){
        return [
            Yii::t('app', 'Doctor') => 1,
            Yii::t('app', 'Master') => 2,
            Yii::t('app', 'Bachelor') => 3,
        ];
    }
    public static function getHighestDegreeByIntValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        return JdhnCommonHelper::getHighestDegree_map()[$intValue];
    }
    public static function getHighestDegreeByStrValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        return JdhnCommonHelper::getHighestDegree_reverse_map()[$intValue];
    }
    //endregion

    //region enroll status 报名状态int和string值互换查询
    public static function getEnrollStatus_map(){
        return [
            1 => Yii::t('app', 'Enroll Success'),
            2 => Yii::t('app', 'Enroll Fail'),
            3 => Yii::t('app', 'Enroll In Process'),
        ];
    }
    public static function getEnrollStatus_reverse_map(){
        return [
            Yii::t('app', 'Enroll Success') => 1,
            Yii::t('app', 'Enroll Fail') => 2,
            Yii::t('app', 'Enroll In Process') => 3,
        ];
    }
    public static function getEnrollStatusByIntValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        return JdhnCommonHelper::getEnrollStatus_map()[$intValue];
    }
    public static function getEnrollStatusByStrValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        return JdhnCommonHelper::getEnrollStatus_reverse_map()[$intValue];
    }
    //endregion


    /**
     * @param array $hash 带匹配的hash表
     * @param $inputVal 输入的查询值
     * @return array|null 返回的值
     */
    private static function matchValueByKeywordsInHash(array $hash, $inputVal){
        if (!isset($inputVal) || empty($inputVal)){
            return null;
        }

        if (!isset($hash) || empty($hash) || sizeof($hash) == 0){
            return null;
        }

        $keyArr = array();
        foreach($hash as $k => $v){
            array_push($keyArr, $k);
        }
        if (sizeof($keyArr) == 0)
            return null;

        $returnArr = array();

        foreach($keyArr as $key){
            if (strpos($key,$inputVal) !== FALSE){
                $val = $hash[$key];
                array_push($returnArr, $val);
            }
        }

        //如果一个项目也没有匹配上
        if (sizeof($returnArr) == 0){
            array_push($returnArr, -1);
        }
        return $returnArr;
    }

    public static function getApplicationRoles4query($inputVal){
        $hashArr = [
            Yii::t('app', 'Volunteer')  => 0,
            Yii::t('app', 'Male Customer') => 1,
            Yii::t('app', 'Female Customer') => 2,
        ];
        return self::matchValueByKeywordsInHash($hashArr, $inputVal);
    }

    public static function getHighestDegrees4query($inputVal){
        $hashArr = [
            Yii::t('app', 'Doctor')  => 1,
            Yii::t('app', 'Master') => 2,
            Yii::t('app', 'Bachelor') => 3,
        ];
        return self::matchValueByKeywordsInHash($hashArr, $inputVal);
    }

    public static function getGenders4query($inputVal){
        $hashArr = [
            Yii::t('app', 'Male')  => 1,
            Yii::t('app', 'Female') => 2,
        ];
        return self::matchValueByKeywordsInHash($hashArr, $inputVal);
    }


    //根据出生年份算年龄
    public static function getAgeByBirthYear($intValue){
        if (!isset($intValue)){
            return null;
        }
        $yearNow = date('Y', time());
        $ageGap = $yearNow - $intValue;
        return $ageGap;
    }

    //根据年龄算出身年份
    public static function getBirthYearByAge($intValue){
        if (!isset($intValue)){
            return null;
        }
        $yearNow = date('Y', time());
        $birth_year = $yearNow - $intValue;
        return $birth_year;
    }

    public static function cut_utf8($str, $max_length = 5, $suffix)
    {
        $strLength = mb_strlen($str, 'utf-8');
        if ( $strLength <= $max_length)
            return mb_substr($str, 0, $strLength, 'utf-8');
        return mb_substr($str, 0, $max_length, 'utf-8') . $suffix;
    }
}