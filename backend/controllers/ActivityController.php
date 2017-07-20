<?php

namespace backend\controllers;

use common\helper\JdhnCommonHelper;
use common\models\HuxuanResult;
use common\service\HuxuanSummaryService;
use moonland\phpexcel\Excel;
use Yii;
use common\models\Activity;
use common\models\ActivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActivityController implements the CRUD actions for Activity model.
 */
class ActivityController extends Controller
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
                    'delete-mobile' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Activity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Activity model.
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
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Activity();

        $model->loadDefaultValues();
        $model->id = JdhnCommonHelper::createGuid();
        $model->created_at = time();
        $model->modified_at =  $model->created_at;

        //如果不是post方法，返回页面
        if (!$model->load(Yii::$app->request->post())) {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->start_time = date('Y-m-d H:i', $model->start_time);
        $model->end_time = date('Y-m-d H:i', $model->end_time);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateMobile($id)
    {
        $this->layout = 'main-mobile';

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-mobile', 'id' => $model->id]);
        } else {
            return $this->render('updateMobile', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteMobile($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index-mobile']);
    }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionIndexMobile(){
        $this->layout = 'main-mobile';

        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $activityList = $dataProvider->getModels();

        return $this->render('indexMobile', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'activityList' => $activityList,
        ]);
    }

    public function actionViewMobile($id){
        $this->layout = 'main-mobile';

        return $this->render('viewMobile', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreateMobile(){
        $this->layout = 'main-mobile';

        $model = new Activity();

        $model->loadDefaultValues();
        $model->id = JdhnCommonHelper::createGuid();
        $model->created_at = time();
        $model->modified_at =  $model->created_at;

        //如果不是post方法，返回页面
        if (!$model->load(Yii::$app->request->post())) {
            return $this->render('createMobile', [
                'model' => $model,
            ]);
        }

        if ($model->save()) {
            return $this->redirect(['view-mobile', 'id' => $model->id]);
        } else {
            return $this->render('create-mobile', [
                'model' => $model,
            ]);
        }
    }

    public function actionExecuteSummary($id){
        $this->layout = 'main-mobile';

        try {
            $result = HuxuanSummaryService::executeByActivityId($id);
            var_dump($result);
        } catch (Exception $e) {
            $result = new ActionResult(false, $e->getMessage(), $e);
        }

        return $this->render('/site/result', [
            'model' => $result,
        ]);
    }

    public function actionExportResult($id){
        $activity = Activity::findOne($id);

        $result = HuxuanResult::find()->where([
            'activity_id' => $id
        ])->orderBy([
            'gender' => SORT_DESC,
            'to_num' => SORT_ASC,
        ])->all();

        if (!$result){
            return $this->redirect(['site/error']);
        }

        Excel::export([
            'models' => $result,
            'fileName' => "{$activity->activity_name}_详细互选结果.xlsx",
            'columns' => [
                [
                'attribute' => 'gender',
//                'header' => 'Content Post',
                'format' => 'text',
                'value' => function($model) {
                    return JdhnCommonHelper::getGenderByIntValue($model->gender);
                },
                ],
                'to_num', 'from_nums',],
            'headers' => [
            ],
        ]);
    }
}
