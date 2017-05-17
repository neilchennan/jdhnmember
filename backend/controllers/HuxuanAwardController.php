<?php

namespace backend\controllers;

use common\models\Activity;
use common\models\HuxuanSummary;
use Yii;
use common\models\HuxuanAward;
use common\models\HuxuanAwardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HuxuanAwardController implements the CRUD actions for HuxuanAward model.
 */
class HuxuanAwardController extends Controller
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
     * Lists all HuxuanAward models.
     * @return mixed
     */
    public function actionIndex()
    {
//        HuxuanAward::deleteAll();
//
//        $hsList = HuxuanSummary::find()->all();
//        foreach($hsList as $hs){
//            //去掉总得分为0的每个组合
//            if ($hs->total_score == 0 || empty($hs->total_score)){
//                $hs->delete();
//            }
//            //如果不为零，更新授奖表
//            else {
//                $male_record = HuxuanAward::findOne([
//                    'male_num' => $hs->male_num,
//                ]);
//                if (isset($male_record) && !empty($male_record)){
//                    if ($male_record->total_score < $hs->total_score){
//                        $male_record->delete();
//                    }
//                }
//
//                $female_record = HuxuanAward::findOne([
//                    'female_num' => $hs->female_num,
//                ]);
//                if (isset($female_record) && !empty($female_record)){
//                    if ($female_record->total_score < $hs->total_score){
//                        $female_record->delete();
//                    }
//                }
//
//                $newHs = new HuxuanAward([
//                    'id' => $hs->id,
//                    'male_num' => $hs->male_num,
//                    'female_num' => $hs->female_num,
//                    'total_score' => $hs->total_score,
//                ]);
//                $newHs->save();
//            }
//        }

        $searchModel = new HuxuanAwardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HuxuanAward model.
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
     * Creates a new HuxuanAward model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HuxuanAward();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HuxuanAward model.
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
     * Deletes an existing HuxuanAward model.
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
     * Finds the HuxuanAward model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HuxuanAward the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HuxuanAward::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionMobileListByActivityId($id)
    {
        $this->layout = 'main-mobile';

        $activity = Activity::findOne([
            'id' => $id,
        ]);
        if (!isset($activity)){
            throw new NotFoundHttpException('Activity Not Found');
        }

        $queryParams = [
            'activity_id' => $activity->id,
        ];

        $searchModel = new HuxuanAwardSearch();
        $dataProvider = $searchModel->search($queryParams);
        $dataProvider->pagination->pageSize = -1;
        $dataProvider->sort->defaultOrder = [
            'total_score' => SORT_DESC,
        ];

        $viewList = $dataProvider->getModels();

        return $this->render('indexMobile', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'viewList' => $viewList,
        ]);
    }
}
