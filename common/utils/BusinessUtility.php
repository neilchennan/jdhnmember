<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/8
 * Time: 23:38
 */

namespace common\utils;

use Yii;
use common\helper\JdhnCommonHelper;
use common\models\Huxuan;
use common\models\HuxuanStarts;
use common\result\ActionResult;

class BusinessUtility
{
    private function __construct($config = [])
    {

    }

    protected static function calHuxuanStarByHuxuan(Huxuan $huxuan){
        $findInStars = HuxuanStarts::findOne([
            'num' => $huxuan->to_num
        ]);
        //如果找到记录，加上
        if (isset($findInStars) && !empty($findInStars)){
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
            'num' => $huxuan->to_num,
            'times' => 1,
            'score' => $huxuan->score,
        ]);
        $newStar->gender =  $huxuan->gender == 1 ? 2 : 1;

        if (!$newStar->save()){
            return new ActionResult(false, Yii::t('app', 'HuxuanStarts created failed.'));
        }
        return new ActionResult(true, Yii::t('app', 'HuxuanStarts created successfully!'));
    }

    public static function calHuxuanStarts(){
        HuxuanStarts::deleteAll();

        $huxuanList = Huxuan::find()->all();
        $totalResult = new ActionResult();

        foreach($huxuanList as $huxuan){
            $result = BusinessUtility::calHuxuanStarByHuxuan($huxuan);
            $totalResult->addSubResult($result);
        }

        return $totalResult;
    }
}