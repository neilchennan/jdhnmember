<?php

namespace backend\controllers;

use common\helper\JdhnCommonHelper;
use common\models\Activity;
use Yii;
use common\models\Enroll;
use common\models\EnrollSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnrollController implements the CRUD actions for Enroll model.
 */
class EnrollController extends Controller
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
     * Lists all Enroll models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnrollSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Enroll model.
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
     * Creates a new Enroll model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Enroll();

        $activities = ArrayHelper::map(Activity::find()->all(), 'id', 'activity_name');

        $model->id = JdhnCommonHelper::createGuid();
        $model->created_at = time();
        $model->modified_at = $model->created_at;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'activities' => $activities,
            ]);
        }
    }

    /**
     * Updates an existing Enroll model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $activities = ArrayHelper::map(Activity::find()->all(), 'id', 'activity_name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'activities' => $activities,
            ]);
        }
    }

    /**
     * Deletes an existing Enroll model.
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
     * Finds the Enroll model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Enroll the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Enroll::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSetStatus($id){
        $model = $this->findModel($id);

        return $this->render('setStatus', [
            'model' => $model,
        ]);
    }

    public function actionSetStatusCommit($id, $status){
        $model = $this->findModel($id);
        $model->status = $status;

        if (!$model->save()){
            Yii::$app->session->setFlash('error', Yii::t('app', 'Set Enroll Status Failed.'));
        }
        else {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Set Enroll Status Successfully!'));
        }

        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionDindex(){
        $this->layout = 'main-dynamic';

        return $this->render('dindex', [
        ]);
    }

    public function actionDcreate(){
//        $this->layout = 'main-dynamic';
        $model = new Enroll();

        $activities = ArrayHelper::map(Activity::find()->all(), 'id', 'activity_name');

        $model->id = JdhnCommonHelper::createGuid();
        $model->created_at = time();
        $model->modified_at = $model->created_at;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('dcreate', [
                'model' => $model,
                'activities' => $activities,
            ]);
        }
    }
}
