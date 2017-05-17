<?php

namespace backend\controllers;

use common\models\Activity;
use common\utils\BusinessUtility;
use Yii;
use common\models\HuxuanStarts;
use common\models\HuxuanStartsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HuxuanStartsController implements the CRUD actions for HuxuanStarts model.
 */
class HuxuanStartsController extends Controller
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
     * Lists all HuxuanStarts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HuxuanStartsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HuxuanStarts model.
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
     * Creates a new HuxuanStarts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HuxuanStarts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HuxuanStarts model.
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
     * Deletes an existing HuxuanStarts model.
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
     * Finds the HuxuanStarts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HuxuanStarts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HuxuanStarts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     *
     */
    public function actionExecute(){
        $totalResult = BusinessUtility::calHuxuanStarts();

        if (!$totalResult->isIsSuccess()){
            Yii::$app->session->setFlash('error', $totalResult->getMessage());
        }
        else {
            Yii::$app->session->setFlash('success', $totalResult->getMessage());
        }

        $searchModel = new HuxuanStartsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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

        $searchModel = new HuxuanStartsSearch();
        $dataProvider = $searchModel->search($queryParams);
        $dataProvider->pagination->pageSize = -1;
        $dataProvider->sort->defaultOrder = [
            'times' => SORT_DESC,
        ];

        $viewList = $dataProvider->getModels();

        return $this->render('indexMobile', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'viewList' => $viewList,
        ]);
    }
}
