<?php

namespace backend\controllers;

use common\models\JdhnActivity;
use common\models\JdhnKeyword;
use Yii;
use common\models\JdhnOrder;
use common\models\JdhnOrderSearch;
use yii\data\Sort;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JdhnOrderController implements the CRUD actions for JdhnOrder model.
 */
class JdhnOrderController extends Controller
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
     * Lists all JdhnOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JdhnOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $activities = ArrayHelper::map(JdhnActivity::find()->orderBy('act_id desc')->all(), 'act_id', 'act_title');

//        $acvitiyTitles = array();
//        $active_activities = JdhnActivity::find()->where([
//            'in', 'act_state', [250, 251, 252, 253, 254, 255, 256]
//        ])->all();
//        foreach($active_activities as $act){
//            array_push($acvitiyTitles, $act->act_title);
//        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'acvitiyTitles' => $acvitiyTitles,
            'activities' => $activities,
        ]);
    }

    /**
     * Displays a single JdhnOrder model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $title = Yii::t('app', 'Order Id: {orderId}', [
           'orderId' => $id,
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'title' => $title,
        ]);
    }

    /**
     * Creates a new JdhnOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelClass = Yii::t('app', 'Jdhn Order');
        $model = new JdhnOrder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ord_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelClass' => $modelClass,
            ]);
        }
    }

    /**
     * Updates an existing JdhnOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelClass = Yii::t('app', 'Jdhn Order');
        $model = $this->findModel($id);

        $activities = ArrayHelper::map(JdhnActivity::find()->orderBy('act_id desc')->all(), 'act_id', 'act_title');
        $ordPayTypes = ArrayHelper::map(JdhnKeyword::findAll(['kw_group' => 'order_payType',]), 'kw_id', 'kw_desc');
        $ordStates = ArrayHelper::map(JdhnKeyword::findAll(['kw_group' => 'order_state',]), 'kw_id', 'kw_desc');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ord_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelClass' => $modelClass,
                'activities' => $activities,
                'ordPayTypes' => $ordPayTypes,
                'ordStates' => $ordStates,
            ]);
        }
    }

    /**
     * Deletes an existing JdhnOrder model.
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
     * Finds the JdhnOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return JdhnOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JdhnOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
