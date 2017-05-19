<?php

namespace frontend\controllers;

use common\helper\JdhnCommonHelper;
use common\models\Activity;
use common\models\HuxuanScoreFactor;
use common\result\ActionResult;
use common\service\HuxuanService;
use frontend\models\CustomerCreateForm;
use Yii;
use common\models\Huxuan;
use common\models\HuxuanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HuxuanController implements the CRUD actions for Huxuan model.
 */
class HuxuanController extends Controller
{
    //chage default layout
    public $layout = "newlayout";
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Huxuan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HuxuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Huxuan model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Huxuan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Huxuan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Huxuan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Huxuan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Huxuan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Huxuan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Huxuan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function deteleHuxuanRecords($myNum, $myGender){
        //如果已存在记录，删除之
        $huxuansInDb = Huxuan::findAll([
            'from_num' => $myNum,
            'gender' => $myGender,
        ]);

        if(sizeof($huxuansInDb) == 0) return;
        foreach($huxuansInDb as $huxuan){
            $huxuan->delete();
        }
    }

    protected function huxuanSave($myNum, $oppNum, $myGender, $order){
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

    /**
     * @return string
     */
    public function actionCustomerCreate($activity_id){
        $activity = Activity::findOne([
            'id' => $activity_id,
        ]);
        if (!isset($activity)){
            return $this->redirect(['/customer/congratulation',
                'message' => Yii::t('app', 'Activity Not Found.')]);
        }

        $model = new CustomerCreateForm();
        $model->activity_id = $activity->id;

        //如果不是post方法，返回页面
        if (!$model->load(Yii::$app->request->post())){
            return $this->render('customerCreate', [
                'model' => $model,
                'activity_name' => $activity->activity_name,
            ]);
        }

        $my_num = $model->my_num;
        $myGender = $model->my_gender;

        $totalResult = new ActionResult();
        HuxuanService::deteleHuxuanRecords($totalResult, $activity->id, $my_num, $myGender);
//        $this->deteleHuxuanRecords($my_num, $myGender);

        $opp1_num = $model->opp_num_order1;
//        $result1 = $this->huxuanSave($my_num, $opp1_num, $model->my_gender, 1);
        $result1 = HuxuanService::huxuanSave($activity->id, $my_num, $opp1_num, $model->my_gender, 1);
        if (!$result1){
            Yii::$app->session->setFlash('error', $result1->getMessage());
            return $this->render('customerCreate', [
                'model' => $model,
                'activity_name' => $activity->activity_name,
            ]);
        }

        $opp2_num = $model->opp_num_order2;
        if (isset($opp2_num) && !empty($opp2_num)){
//            $result2 = $this->huxuanSave($my_num, $opp2_num, $model->my_gender, 2);
            $result2 = HuxuanService::huxuanSave($activity->id, $my_num, $opp2_num, $model->my_gender, 2);
            if (!$result2){
                Yii::$app->session->setFlash('error', $result2->getMessage());
                return $this->render('customerCreate', [
                    'model' => $model,
                    'activity_name' => $activity->activity_name,
                ]);
            }
        }

        $opp3_num = $model->opp_num_order3;
        if (isset($opp3_num) && !empty($opp3_num)){
//            $result3 = $this->huxuanSave($my_num, $opp3_num, $model->my_gender, 3);
            $result3 = HuxuanService::huxuanSave($activity->id, $my_num, $opp3_num, $model->my_gender, 3);
            if (!$result3){
                Yii::$app->session->setFlash('error', $result3->getMessage());
                return $this->render('customerCreate', [
                    'model' => $model,
                    'activity_name' => $activity->activity_name,
                ]);
            }
        }

//        Yii::$app->session->setFlash('success', Yii::t('app', 'Thank you for your selection. System is matching.'));
        return $this->redirect(['/customer/congratulation', 'message' => Yii::t('app', 'Thank you for your selection. System is matching.')]);
    }
}
