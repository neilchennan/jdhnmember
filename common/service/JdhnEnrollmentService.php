<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/6/13
 * Time: 15:55
 */

namespace common\service;


use common\models\JdhnEnrollment;
use common\models\JdhnKeywordEnum;
use common\result\ActionResult;

class JdhnEnrollmentService
{
    /**
     * @param string $ids4Approve
     * @return ActionResult
     */
    public static function approveByIdsStr($ids4Approve){
        return self::setStateByIdsStr($ids4Approve, JdhnKeywordEnum::ENROLL_STATE_CHECK_PASSED);
    }

    public static function denyByIdsStr($ids4Deny){
        return self::setStateByIdsStr($ids4Deny, JdhnKeywordEnum::ENROLL_STATE_CHECK_FAILED);
    }

    protected static function setStateByIdsStr($ids, $stateToSet){
        if (!isset($ids) || empty($ids)){
            return new ActionResult(false, 'ids4Approve not set');
        }
        $totalResult = new ActionResult();
        $idsArr = explode(',', $ids);
        $stateDesc = JdhnKeywordEnum::getEnrollStateDesc($stateToSet);
        foreach($idsArr as $enroll_id){
            $enrollment = JdhnEnrollment::findOne($enroll_id);
            if (!isset($enrollment)){
                $totalResult->addSubResult(new ActionResult(false, "enrollment $enroll_id not found"));
                continue;
            }
            if ($enrollment->enroll_state == $stateToSet){
                $totalResult->addSubResult(new ActionResult(true, "enrollment $enroll_id state is alreday set to $stateDesc."));
                continue;
            }
            $enrollment->enroll_state = $stateToSet;
            if (!$enrollment->save()){
                $totalResult->addSubResult(new ActionResult(false, "enrollment $enroll_id set state to $stateDesc saved fail!"));
                continue;
            }
            $totalResult->addSubResult(new ActionResult(true, "enrollment $enroll_id set state to $stateDesc saved successfully!"));
        }
        return $totalResult;
    }
}