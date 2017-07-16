<?php

namespace backend\controllers;

use common\helper\JdhnCommonHelper;
use common\models\Activity;
use common\models\CommonEnum;
use common\models\QueryHuxuanForm;
use common\service\HuxuanService;
use moonland\phpexcel\Excel;
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

    /**
     * @return \yii\web\Response
     */
    public function actionExport(){
        $activity = Activity::findOne([
            'is_default' => true
        ]);
        if (!$activity){
            return $this->redirect(['site/error']);
        }

        $result = Huxuan::find()->all();
        if (!$result){
            return $this->redirect(['site/error']);
        }

        Excel::export([
            'models' => $result,
            'fileName' => $activity->activity_name.Yii::t('app', 'Huxuan Details'),
            'columns' => ['from_num', 'to_num', 'order',
                [
                    'attribute' => 'gender',
                    'header' => Yii::t('app', 'Gender'),
                    'format' => 'text',
                    'value' => function($model) {
                        return  JdhnCommonHelper::getGenderByIntValue($model->gender);
                    },
                ],
                'score', 'created_at:datetime'],
            'headers' => [
            ],
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
//            'activity_id' => $activity->id,
        ];

        $searchModel = new HuxuanSearch();
        $searchModel->activity_id = $activity->id;
        $dataProvider = $searchModel->search($queryParams);
        $dataProvider->pagination->pageSize = -1;

        $viewList = $dataProvider->getModels();

        return $this->render('indexMobile', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'viewList' => $viewList,
        ]);
    }

    public function actionQueryMobile($activity_id){
        $this->layout = 'main-mobile';

        $model = new QueryHuxuanForm();
        $model->gender = CommonEnum::GENDER_MALE;
        $model->from_or_to = 1;
        $model->activity_id = $activity_id;

        if ($model->load(Yii::$app->request->post())){
            if ($model->from_or_to == CommonEnum::HUXUAN_TO){
                $oppGender = $model->gender == CommonEnum::GENDER_MALE ? CommonEnum::GENDER_FEMALE : CommonEnum::GENDER_MALE;
                $query = Huxuan::find()->where([
                    'gender' => $oppGender,
                    'to_num' => $model->num,
                    'activity_id' => $activity_id,
                ]);
            }
            else {
                $query = Huxuan::find()->where([
                    'gender' => $model->gender,
                    'from_num' => $model->num,
                    'activity_id' => $activity_id,
                ]);
            }
            $huxuanList = $query->all();
            $msgList = array();

            $oppGender = $model->gender == CommonEnum::GENDER_MALE ? CommonEnum::GENDER_FEMALE : CommonEnum::GENDER_MALE;
            foreach($huxuanList as $item){
                $orderStr = JdhnCommonHelper::getRomaNumberByIntValue($item->order);
                if ($model->from_or_to == CommonEnum::HUXUAN_TO){
                    $str = HuxuanService::getNegativeMessage($oppGender, $item->from_num, $orderStr);
                }
                else {
                    $str = HuxuanService::getPositiveMessage($oppGender, $item->to_num, $orderStr);
                }
                array_push($msgList, $str);
            }
            if (!isset($msgList) || sizeof($msgList) == 0){
                array_push($msgList, Yii::t('app', 'Record Not Found...'));
            }

            return $this->render('queryMobile', [
                'model' => $model,
                'messages' => $msgList,
            ]);
        }

        return $this->render('queryMobile', [
            'model' => $model,
            'messages' => null,
        ]);
    }
}
