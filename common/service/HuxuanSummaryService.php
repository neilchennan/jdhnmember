<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/18
 * Time: 22:11
 */

namespace common\service;

use Yii;
use common\helper\JdhnCommonHelper;
use common\models\CommonEnum;
use common\models\Huxuan;
use common\models\HuxuanAward;
use common\models\HuxuanStarts;
use common\models\HuxuanSummary;
use common\result\ActionResult;

class HuxuanSummaryService extends HuxuanSummary
{
    protected static function handleHuxuanMale(Huxuan $huxuan){
        //先找一下是否已经有录入了的数据
        $summaryInDb = HuxuanSummary::findOne([
            'male_num' => $huxuan->from_num,
            'female_num' => $huxuan->to_num,
        ]);

        $nowTime = time();

        if(isset($summaryInDb)){
            $summaryInDb->male_score = $huxuan->score;
            //如果女也选了男，就是女的分数大于0
            if($summaryInDb->female_score > 0){
                $summaryInDb->total_score = $summaryInDb->male_score + $summaryInDb->female_score;
            }
            //如果女没有选男，则总分为0
            else {
                $summaryInDb->total_score = 0;
            }
            $summaryInDb->male_order = $huxuan->order;
            $summaryInDb->modified_at = $nowTime;

            if (!$summaryInDb->save()){
                return new ActionResult(false, Yii::t('app', 'HuxuanSummary update failed.'));
            }
            return new ActionResult(true, Yii::t('app', 'HuxuanSummary update successfully!'));
        }

//        不存在，新建
        $newSummary = new HuxuanSummary([
            'id' => JdhnCommonHelper::createGuid(),
            'activity_id' => $huxuan->activity_id,
            'male_num' => $huxuan->from_num,
            'male_order' => $huxuan->order,
            'female_num' => $huxuan->to_num,
            'male_score' => $huxuan->score,
            'created_at' => $nowTime,
            'modified_at' => $nowTime,
        ]);
        if (!$newSummary->save()){
            return new ActionResult(false, Yii::t('app', 'HuxuanSummary created failed.'));
        }
        return new ActionResult(true, Yii::t('app', 'HuxuanSummary created successfully!'));
    }

    protected static function handleHuxuanFemale(Huxuan $huxuan){
        //先找一下是否已经有录入了的数据
        $summaryInDb = HuxuanSummary::findOne([
            'male_num' => $huxuan->to_num,
            'female_num' => $huxuan->from_num,
        ]);

        $nowTime = time();
//        已存在
        if(isset($summaryInDb)){
            $summaryInDb->female_score = $huxuan->score;
            //如果男也选了女，就是男的分数大于0
            if($summaryInDb->male_score > 0){
                $summaryInDb->total_score = $summaryInDb->male_score + $summaryInDb->female_score;
            }
            //如果男没有选女，则总分为0
            else {
                $summaryInDb->total_score = 0;
            }

            $summaryInDb->female_order = $huxuan->order;
            $summaryInDb->modified_at = $nowTime;

            if (!$summaryInDb->save()){
                return new ActionResult(false, Yii::t('app', 'HuxuanSummary update failed.'));
            }
            return new ActionResult(true, Yii::t('app', 'HuxuanSummary update successfully!'));
        }

//        不存在，新建
        $newSummary = new HuxuanSummary([
            'id' => JdhnCommonHelper::createGuid(),
            'activity_id' => $huxuan->activity_id,
            'male_num' => $huxuan->to_num,
            'female_num' => $huxuan->from_num,
            'female_order' => $huxuan->order,
            'female_score' => $huxuan->score,
            'created_at' => $nowTime,
            'modified_at' => $nowTime,
        ]);
        if (!$newSummary->save()){
            return new ActionResult(false, Yii::t('app', 'HuxuanSummary created failed.'));
        }
        return new ActionResult(true, Yii::t('app', 'HuxuanSummary created successfully!'));
    }

    /**
     * 统计万人迷
     * @param Huxuan $huxuan
     * @return ActionResult
     */
    protected static function calHuxuanStarByHuxuan(Huxuan $huxuan){
        //找一找被选的记录，是否存在
        $findInStars = HuxuanStarts::findOne([
            'activity_id'=> $huxuan->activity_id,
            'num' => $huxuan->to_num
        ]);
        //如果找到记录，加上
        if (isset($findInStars)){
            $findInStars->score = $huxuan->score + $findInStars->score;
            $findInStars->times = $findInStars->times + 1;
            if (!$findInStars->save()){
                return new ActionResult(false, Yii::t('app', 'HuxuanStarts update failed.'));
            }
            return new ActionResult(true, Yii::t('app', 'HuxuanStarts update successfully!'));
        }

        // 不存在，新建
        $newStar = new HuxuanStarts([
            'id' => JdhnCommonHelper::createGuid(),
            'activity_id'=> $huxuan->activity_id,
            'num' => $huxuan->to_num,
            'times' => 1,
            'score' => $huxuan->score,
        ]);
        $newStar->gender = $huxuan->gender == CommonEnum::GENDER_MALE ? CommonEnum::GENDER_FEMALE : CommonEnum::GENDER_MALE;

        if (!$newStar->save()){
            return new ActionResult(false, Yii::t('app', 'HuxuanStarts created failed.'));
        }
        return new ActionResult(true, Yii::t('app', 'HuxuanStarts created successfully!'));
    }

    protected static function handleHuxuanItem($huxuan){
        self::calHuxuanStarByHuxuan($huxuan);
        if ($huxuan->gender == CommonEnum::GENDER_MALE){
            return self::handleHuxuanMale($huxuan);
        }
        else {
            return self::handleHuxuanFemale($huxuan);
        }
    }

    /**
     * @param $activityId
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public static function executeByActivityId($activityId){

        //region 删除该活动所有相关统计记录
        HuxuanSummary::deleteAll([
            'activity_id' => $activityId,
        ]);
        HuxuanAward::deleteAll([
            'activity_id' => $activityId,
        ]);
        HuxuanStarts::deleteAll([
            'activity_id' => $activityId,
        ]);
        //endregion

        $huxuanList = Huxuan::findAll([
            'activity_id' => $activityId,
        ]);

        $totalResult = new ActionResult();

        foreach($huxuanList as $huxuan){
            $result = self::handleHuxuanItem($huxuan);
            $totalResult->addSubResult($result);
        }

        $hsList = HuxuanSummary::findAll([
            'activity_id' => $activityId,
        ]);
        foreach($hsList as $hs){
            //去掉总得分为0的每个组合
            if (empty($hs->total_score)){
                if (!$hs->delete()){
                    $totalResult->addSubResult(new ActionResult(false, '0 record deleted failed.'));
                }
                else {
                    $totalResult->addSubResult(new ActionResult(true, '0 record deleted successfully!'));
                }
            }
            //如果不为零，更新授奖表
            else {
                $male_record = HuxuanAward::findOne([
                    'activity_id' => $hs->activity_id,
                    'male_num' => $hs->male_num,
                ]);
                //如果找到了相同的男嘉宾记录
                if (isset($male_record)){
                    //找到了比自己分数低的组合
                    if ($male_record->total_score < $hs->total_score){
                        //删除之
                        if (!$male_record->delete()){
                            $totalResult->addSubResult(new ActionResult(false, 'Huxuan Award record delete failed.'));
                        }
                        else {
                            $totalResult->addSubResult(new ActionResult(true, 'Huxuan Award record delete successfully!'));
                        }
                        //加上自己
                        $newHs = new HuxuanAward([
                            'id' => $hs->id,
                            'activity_id' => $hs->activity_id,
                            'male_num' => $hs->male_num,
                            'female_num' => $hs->female_num,
                            'total_score' => $hs->total_score,
                        ]);
                        if (!$newHs->save()){
                            $totalResult->addSubResult(new ActionResult(false, 'Huxuan Award record created failed.'));
                        }
                        else {
                            $totalResult->addSubResult(new ActionResult(true, 'Huxuan Award record created successfully!'));
                        }
                    }
                }
                else{
                    $female_record = HuxuanAward::findOne([
                        'activity_id' => $hs->activity_id,
                        'female_num' => $hs->female_num,
                    ]);
                    //如果找到了相同的女嘉宾记录
                    if (isset($female_record)){
                        //找到了比自己分数低的组合
                        if ($female_record->total_score < $hs->total_score){
                            //删除之
                            if (!$female_record->delete()){
                                $totalResult->addSubResult(new ActionResult(false, 'Huxuan Award record created failed.'));
                            }
                            else {
                                $totalResult->addSubResult(new ActionResult(true, 'Huxuan Award record created successfully!'));
                            }
                            //加上自己
                            $newHs2 = new HuxuanAward([
                                'id' => $hs->id,
                                'activity_id' => $hs->activity_id,
                                'male_num' => $hs->male_num,
                                'female_num' => $hs->female_num,
                                'total_score' => $hs->total_score,
                            ]);
                            if (!$newHs2->save()){
                                $totalResult->addSubResult(new ActionResult(false, 'Huxuan Award record created failed.'));
                            }
                            else {
                                $totalResult->addSubResult(new ActionResult(true, 'Huxuan Award record created successfully!'));
                            }
                        }
                    }
                    else {
                        //加上自己的记录
                        $newHsSelf = new HuxuanAward([
                            'id' => $hs->id,
                            'activity_id' => $hs->activity_id,
                            'male_num' => $hs->male_num,
                            'female_num' => $hs->female_num,
                            'total_score' => $hs->total_score,
                        ]);
                        if (!$newHsSelf->save()){
                            $totalResult->addSubResult(new ActionResult(false, 'Huxuan Award record created failed.'));
                        }
                        else {
                            $totalResult->addSubResult(new ActionResult(true, 'Huxuan Award record created successfully!'));
                        }
                    }
                }
            }
        }

        return $totalResult;
    }
}