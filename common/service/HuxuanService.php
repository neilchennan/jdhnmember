<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/19
 * Time: 13:18
 */

namespace common\service;

use common\helper\JdhnCommonHelper;
use common\models\HuxuanScoreFactor;
use Yii;
use common\models\Huxuan;
use common\result\ActionResult;

class HuxuanService extends Huxuan
{
    /**
     * @param ActionResult $totalResult
     * @param $activity_id
     * @param $myNum
     * @param $myGender
     * @throws \Exception
     * @throws \Throwable
     */
    public static function deteleHuxuanRecords(ActionResult $totalResult, $activity_id, $myNum, $myGender){
        //如果已存在记录，删除之
        $huxuansInDb = Huxuan::findAll([
            'activity_id' => $activity_id,
            'from_num' => $myNum,
            'gender' => $myGender,
        ]);

        if(sizeof($huxuansInDb) == 0) return;
        foreach($huxuansInDb as $huxuan){
            if (!$huxuan->delete()){
                $totalResult->addSubResult(new ActionResult(false, Yii::t('app', 'Delete Huxuan Record failed.')));
            }
            $totalResult->addSubResult(new ActionResult(true, Yii::t('app', 'Delete Huxuan Record successfully!')));
        }
    }

    public static function huxuanSave($activity_id, $myNum, $oppNum, $myGender, $order){
        if (!isset($activity_id) || empty($activity_id)){
            return new ActionResult(false, 'activity_id not set');
        }
        if (!isset($myNum) || empty($myNum)){
            return new ActionResult(false, 'from num not set');
        }
        if (!isset($oppNum) || empty($oppNum)){
            return new ActionResult(false, 'to num not set');
        }
        if (!isset($myGender) || empty($myGender)){
            return new ActionResult(false, '$myGender not set');
        }
        if (!isset($order) || empty($order)){
            return new ActionResult(false, '$order not set');
        }
        $genderStr = JdhnCommonHelper::getGenderByIntValue($myGender);
        $nowTime = time();
        date_default_timezone_set('Asia/Shanghai');
        $nowIimeStr = date("Y-m-d H:i:s",$nowTime);

        $factorInDb = HuxuanScoreFactor::findOne([
            'gender' => $myGender,
            'order' => $order,
        ]);
        if (!isset($factorInDb) || empty($factorInDb)){
            return new ActionResult(false, Yii::t('app', 'Huxuan Factor not found.'));
        }

        $my_score_with_opp = $factorInDb->factor;

        $descriptionStr = Yii::t('app', 'Huxuan {genderStr} from {fromNum} to {toNum} at {timeStr}.',[
            'genderStr' => $genderStr,
            'fromNum' => $myNum,
            'toNum' => $oppNum,
            'timeStr' => $nowIimeStr
        ]);

        $newHuxuanInstance = new Huxuan([
            'activity_id' => $activity_id,
            'from_num' => $myNum,
            'to_num' => $oppNum,
            'order' => $order,
            'gender' => $myGender,
            'score' => $my_score_with_opp,
            'created_at' => $nowTime,
            'modified_at' => $nowTime,
            'description' =>  $descriptionStr,
        ]);
        $newHuxuanInstance->id = JdhnCommonHelper::createGuid();
        if(!$newHuxuanInstance->save()){
            return new ActionResult(false, Yii::t('app', 'Huxuan {genderStr} from {fromNum} to {toNum} Save Failed at {timeStr}.', [
                'genderStr' => $genderStr,
                'fromNum' => $myNum,
                'toNum' => $oppNum,
                'timeStr' => $nowIimeStr
            ]));
        }
        return new ActionResult(true, Yii::t('app', 'Huxuan {genderStr} from {fromNum} to {toNum} Save Successfully at {timeStr}!', [
            'genderStr' => $genderStr,
            'fromNum' => $myNum,
            'toNum' => $oppNum,
            'timeStr' => $nowIimeStr
        ]));
    }


}