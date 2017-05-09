<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/4
 * Time: 11:26
 */

namespace common\helper;

use Yii;

class JdhnCommonHelper
{
    public static function getGender_map(){
        return [
            1 => Yii::t('app', 'Male'),
            2 => Yii::t('app', 'Female'),
        ];
    }

    public static function getHighestDegree_map(){
        return [
            1 => Yii::t('app', 'Doctor'),
            2 => Yii::t('app', 'Master'),
            3 => Yii::t('app', 'Bachelor'),
        ];
    }

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

    //region 性别int和string值互换查询
    public static function getGenderByIntValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        $genderArr = [
            1 => Yii::t('app', 'Male'),
            2 => Yii::t('app', 'Female'),
        ];
        return $genderArr[$intValue];
    }
    public static function getGenderByStrValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        $genderArr = [
            Yii::t('app', 'Male') => 1 ,
            Yii::t('app', 'Female') => 2,
        ];
        return $genderArr[$intValue];
    }
    //endregion

    //region 报名者身份int和string值互换查询
    public static function getApplicantRoleByIntValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        $applicantRoleArr = [
            0 => Yii::t('app', 'Volunteer'),
            1 => Yii::t('app', 'Male Customer'),
            2 => Yii::t('app', 'Female Customer'),
        ];
        return $applicantRoleArr[$intValue];
    }
    public static function getApplicantRoleByStrValue($inputVal){
        if (!isset($inputVal) || empty($inputVal)){
            return null;
        }

        $applicantRoleArr = [
            Yii::t('app', 'Volunteer')  => 0,
            Yii::t('app', 'Male Customer') => 1,
            Yii::t('app', 'Female Customer') => 2,
        ];
        return $applicantRoleArr[$inputVal];
    }
    //endregion

    //region 最高学历int和string值互换查询
    public static function getHighestDegreeByIntValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        $highestDegreeArr = [
            1 => Yii::t('app', 'Doctor'),
            2 => Yii::t('app', 'Master'),
            3 => Yii::t('app', 'Bachelor'),
        ];
        return $highestDegreeArr[$intValue];
    }
    public static function getHighestDegreeByStrValue($intValue){
        if (!isset($intValue)){
            return null;
        }
        $highestDegreeArr = [
            Yii::t('app', 'Doctor') => 1,
            Yii::t('app', 'Master') => 2,
            Yii::t('app', 'Bachelor') => 3,
        ];
        return $highestDegreeArr[$intValue];
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
}