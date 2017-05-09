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
            return $this->render('congratulation');
        } else {
            return $this->render('createEnroll', [
                'model' => $model,
                'activity' => $activity,
            ]);
        }

    }

    public function actionQueryEnrollStatus() {
        $model = new QueryEnrollStatusForm();

        if (!$model->load(Yii::$app->request->post())){
            return $this->render('queryEnrollStatus', [
                'model' => $model,
            ]);
        }

        $enroll = Enroll::findOne([
            'nickname' => $model->nickname,
            'mobile' => $model->mobile,
        ]);

        if (!isset($enroll) || empty($enroll)){
            Yii::$app->session->setFlash('error', Yii::t('app', 'Enroll Record Not Found.'));
            return $this->render('queryEnrollStatus', [
                'model' => $model,
            ]);
        }

        Yii::$app->session->setFlash('success', Yii::t('app', 'Enroll Record Found.'));
        return $this->render('viewEnroll', [
            'model' => $enroll,
        ]);
    }
}