<?php

namespace backend\controllers;

use common\models\JdhnActivity;
use common\models\JdhnEnrollmentActionForm;
use common\result\ActionResult;
use common\service\JdhnEnrollmentService;
use Yii;
use common\models\JdhnEnrollment;
use common\models\JdhnEnrollmentSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JdhnEnrollmentController implements the CRUD actions for JdhnEnrollment model.
 */
class JdhnEnrollmentController extends Controller
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
     * Lists all JdhnEnrollment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JdhnEnrollmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $activities = ArrayHelper::map(JdhnActivity::find()->orderBy('act_id desc')->all(), 'act_id', 'act_title');

        $actionModel = new JdhnEnrollmentActionForm();

        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            $actionModel->load($post);
            $ids4Approve = $actionModel->ids4Approve;
            if (isset($ids4Approve)){
                $result = JdhnEnrollmentService::approveByIdsStr($ids4Approve);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'acvitiyTitles' => $acvitiyTitles,
            'activities' => $activities,
            'actionModel' => $actionModel,
        ]);
    }

    public function actionJsonApprove(){
        $form = new JdhnEnrollmentActionForm();

        if ($form->load(Yii::$app->request->post())) {
            $ids4Approve = $form->ids4Approve;
            $result = JdhnEnrollmentService::approveByIdsStr($ids4Approve);
            return $result->toJson();
        } else {
            $result = new ActionResult(false, 'json-approve fail');
            return $result->toJson();
        }
    }

    public function actionJsonDeny(){
        $form = new JdhnEnrollmentActionForm();

        if ($form->load(Yii::$app->request->post())) {
            $ids4Deny = $form->ids4Deny;
            $result = JdhnEnrollmentService::denyByIdsStr($ids4Deny);
            return $result->toJson();
        } else {
            $result = new ActionResult(false, 'json-deny fail');
            return $result->toJson();
        }
    }

    /**
     * Displays a single JdhnEnrollment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new JdhnEnrollment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JdhnEnrollment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->enroll_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JdhnEnrollment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->enroll_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JdhnEnrollment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JdhnEnrollment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JdhnEnrollment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JdhnEnrollment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
