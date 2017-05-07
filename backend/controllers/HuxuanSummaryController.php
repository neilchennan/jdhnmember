<?php

namespace backend\controllers;

use common\helper\JdhnCommonHelper;
use common\models\Huxuan;
use common\result\ActionResult;
use Yii;
use common\models\HuxuanSummary;
use common\models\HuxuanSummarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HuxuanSummaryController implements the CRUD actions for HuxuanSummary model.
 */
class HuxuanSummaryController extends Controller
{
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
     * Lists all HuxuanSummary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HuxuanSummarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HuxuanSummary model.
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
     * Creates a new HuxuanSummary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HuxuanSummary();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HuxuanSummary model.
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
     * Deletes an existing HuxuanSummary model.
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
     * Finds the HuxuanSummary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HuxuanSummary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HuxuanSummary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     *
     */
    public function actionExecute(){
        $huxuanList = Huxuan::find()->all();

        $totalResult = new ActionResult();

        foreach($huxuanList as $huxuan){
            $result = $this->handleHuxuan($huxuan);
            $totalResult->addSubResult($result);
        }

        if (!$totalResult->isIsSuccess()){
            Yii::$app->session->setFlash('error', $totalResult->getMessage());
        }
        else {
            Yii::$app->session->setFlash('success', $totalResult->getMessage());
        }

        $searchModel = new HuxuanSummarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function handleHuxuanMale(Huxuan $huxuan){
        $summaryInDb = HuxuanSummary::findOne([
            'male_num' => $huxuan->from_num,
            'female_num' => $huxuan->to_num,
        ]);

        $nowTime = time();
        $nowIimeStr = date("Y-m-d H:i:s",$nowTime);
//        已存在
        if(isset($summaryInDb)){
            $summaryInDb->male_score = $huxuan->score;
            if($summaryInDb->female_score > 0){
                $summaryInDb->total_score = $summaryInDb->male_score + $summaryInDb->female_score;
            }
            else {
                $summaryInDb->total_score = 0;
            }
            $summaryInDb->modified_at = $nowTime;

            if (!$summaryInDb->save()){
                return new ActionResult(false, Yii::t('app', 'HuxuanSummary update failed.'));
            }
            return new ActionResult(true, Yii::t('app', 'HuxuanSummary update successfully!'));
        }

//        不存在，新建
        $newSummary = new HuxuanSummary([
            'id' => JdhnCommonHelper::createGuid(),
            'male_num' => $huxuan->from_num,
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

    protected function handleHuxuanFemale(Huxuan $huxuan){
        $summaryInDb = HuxuanSummary::findOne([
            'male_num' => $huxuan->to_num,
            'female_num' => $huxuan->from_num,
        ]);

        $nowTime = time();
        $nowIimeStr = date("Y-m-d H:i:s",$nowTime);
//        已存在
        if(isset($summaryInDb)){
            $summaryInDb->female_score = $huxuan->score;
            if($summaryInDb->male_score > 0){
                $summaryInDb->total_score = $summaryInDb->male_score + $summaryInDb->female_score;
            }
            else {
                $summaryInDb->total_score = 0;
            }
            $summaryInDb->modified_at = $nowTime;

            if (!$summaryInDb->save()){
                return new ActionResult(false, Yii::t('app', 'HuxuanSummary update failed.'));
            }
            return new ActionResult(true, Yii::t('app', 'HuxuanSummary update successfully!'));
        }

//        不存在，新建
        $newSummary = new HuxuanSummary([
            'id' => JdhnCommonHelper::createGuid(),
            'male_num' => $huxuan->to_num,
            'female_num' => $huxuan->from_num,
            'female_score' => $huxuan->score,
            'created_at' => $nowTime,
            'modified_at' => $nowTime,
        ]);
        if (!$newSummary->save()){
            return new ActionResult(false, Yii::t('app', 'HuxuanSummary created failed.'));
        }
        return new ActionResult(true, Yii::t('app', 'HuxuanSummary created successfully!'));
    }

    protected function handleHuxuan(Huxuan $huxuan){
        if ($huxuan->gender == 1){
            return $this->handleHuxuanMale($huxuan);
        }
        else {
            return $this->handleHuxuanFemale($huxuan);
        }
    }
}
