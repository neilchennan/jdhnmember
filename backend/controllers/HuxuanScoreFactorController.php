<?php

namespace backend\controllers;

use common\helper\JdhnCommonHelper;
use Yii;
use common\models\HuxuanScoreFactor;
use common\models\HuxuanScoreFactorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HuxuanScoreFactorController implements the CRUD actions for HuxuanScoreFactor model.
 */
class HuxuanScoreFactorController extends Controller
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
     * Lists all HuxuanScoreFactor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HuxuanScoreFactorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HuxuanScoreFactor model.
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
     * Creates a new HuxuanScoreFactor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HuxuanScoreFactor();
        $model->loadDefaultValues();

        //如果不是post方法，返回页面
        if (!$model->load(Yii::$app->request->post())) {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        //检查重复项，如果gender, order, 都视为相同项，则不允许增加。
        $query = HuxuanScoreFactor::find();
        $query->andFilterWhere([
            'gender' => $model->gender,
            'order' => $model->order,
        ]);
        if($query->count() > 0){
            Yii::$app->session->setFlash('error', Yii::t('app', 'Find Duplicated Huxuan Score Factor.'));
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        $model->id = JdhnCommonHelper::createGuid();
        $model->created_at = time();
        $model->modified_at =  $model->created_at;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HuxuanScoreFactor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->modified_at = time();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HuxuanScoreFactor model.
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
     * Finds the HuxuanScoreFactor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HuxuanScoreFactor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HuxuanScoreFactor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
