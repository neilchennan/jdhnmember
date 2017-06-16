<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/6/13
 * Time: 16:06
 */

namespace common\models;

use Yii;
final class JdhnKeywordEnum
{
    const ENROLL_STATE_PAYED = 272;
    const ENROLL_STATE_CHECK_PASSED = 273;
    const ENROLL_STATE_CHECK_FAILED = 274;

    public static function getEnrollStateDesc($state){
        $keyword = JdhnKeyword::findOne([
            'kw_id' => $state,
        ]);
        if (!isset($keyword)){
            return Yii::t('app', 'Enroll State with id not found');
        }
        return $keyword->kw_desc;
    }
}