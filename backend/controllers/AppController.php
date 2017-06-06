<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/6/6
 * Time: 20:55
 */

namespace backend\controllers;


use common\models\JdhnActivity;
use common\models\JdhnEnrollment;
use common\models\JdhnOrder;
use common\models\JdhnUser;
use Yii;
use yii\base\Controller;

class AppController extends Controller
{
    public function actionIndex(){
        $userCount = JdhnUser::find()->count();
        $activityCount = JdhnActivity::find()->count();
        $enrollmentCount = JdhnEnrollment::find()->count();
        $orderCount = JdhnOrder::find()->count();

        return $this->render('index', [
            'userCount' => $userCount,
            'enrollmentCount' => $enrollmentCount,
            'orderCount' => $orderCount,
            'activityCount' => $activityCount,
        ]);
    }
}