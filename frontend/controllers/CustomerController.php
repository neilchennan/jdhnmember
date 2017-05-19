<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/9
 * Time: 16:23
 */

namespace frontend\controllers;


use common\helper\JdhnCommonHelper;
use common\models\Enroll;
use frontend\models\QueryEnrollStatusForm;
use Yii;
use common\models\Activity;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CustomerController extends Controller
{
    //chage default layout
    public $layout = "newlayout";

    public function actionEnroll(){
        $defaultActivity = Activity::findOne([
            'is_default' => 1,
        ]);

        if (!isset($defaultActivity) || empty($defaultActivity)){
            throw new NotFoundHttpException(Yii::t('app', 'No Activity is active now.'));
        }

        return $this->redirect(['create-enroll', 'activity_id' => $defaultActivity->id]);
    }

    public function actionCreateEnroll($activity_id){
        $activity = Activity::findOne([
            'id' => $activity_id
        ]);

        if (!isset($activity) || empty($activity)){
            throw new NotFoundHttpException(Yii::t('app', 'Activity not found.'));
        }

        $nowTime = time();
        $model = new Enroll([
            'id' => JdhnCommonHelper::createGuid(),
            'activity_id' => $activity_id,
            'created_at' => $nowTime,
            'modified_at' => $nowTime,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('congratulation', [
                'message' => ''
            ]);
        } else {
            return $this->render('createEnroll', [
                'model' => $model,
                'activity' => $activity,
            ]);
        }

    }

    public function actionQueryEnrollStatus() {
        $model = new QueryEnrollStatusForm();

        //找到当前的默认活动
        $activeActivity = Activity::findOne(['is_default' => 1]);
        $model->activity_name = $activeActivity->activity_name;

        if (!$model->load(Yii::$app->request->post())){
            return $this->render('queryEnrollStatus', [
                'model' => $model,
            ]);
        }

        $enroll = Enroll::findOne([
            'mobile' => $model->mobile,
        ]);

        if (!isset($enroll) || empty($enroll)){
            Yii::$app->session->setFlash('error', Yii::t('app', 'Enroll Record Not Found. Please contact service weixin: jdhn2017.'));
            return $this->render('queryEnrollStatus', [
                'model' => $model,
            ]);
        }

        Yii::$app->session->setFlash('success', Yii::t('app', 'Enroll Record Found. Please remember your id.'));
        return $this->render('viewEnroll', [
            'model' => $enroll,
        ]);
    }

    public function actionCongratulation($message){
        return $this->render('congratulation', [
            'message' => $message,
        ]);
    }
}