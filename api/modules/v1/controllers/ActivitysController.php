<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/8/1
 * Time: 22:26
 */

namespace api\modules\v1\controllers;


use common\models\JdhnActComment;
use common\models\JdhnActivity;
use common\models\JdhnEnrollment;
use common\models\ResponseData;
use common\models\StatusCodeEnum;
use yii\filters\auth\CompositeAuth;
use yii\filters\RateLimiter;
use yii\helpers\Json;
use yii\rest\ActiveController;
use yii\web\Response;

class ActivitysController extends ActiveController
{
    public $modelClass = 'common\models\JdhnActivity';

    public function behaviors(){
        $behaviors = parent::behaviors();

        //速率限制
        $behaviors['rateLimiter'] = [
            'class' => RateLimiter::className(),
            'enableRateLimitHeaders' => true,
        ];

//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                /*下面是三种验证access_token方式*/
//                //1.HTTP 基本认证: access token 当作用户名发送，应用在access token可安全存在API使用端的场景，例如，API使用端是运行在一台服务器上的程序。
//                //HttpBasicAuth::className(),
//                //2.OAuth 2: 使用者从认证服务器上获取基于OAuth2协议的access token，然后通过 HTTP Bearer Tokens 发送到API 服务器。
//                //HttpBearerAuth::className(),
//                //3.请求参数: access token 当作API URL请求参数发送，这种方式应主要用于JSONP请求，因为它不能使用HTTP头来发送access token
//                //http://localhost/user/index/index?access-token=123
//                QueryParamAuth::className(),
//            ],
//        ];

        $behaviors['contentNegotiator']['formats']['text/html'] =  Response::FORMAT_JSONP;
        return $behaviors;
    }

    public function actions() {
        $actions = parent::actions();
        // 禁用""index,delete" 和 "create" 操作
        unset($actions['index'],$actions['delete'], $actions['create']);
        return $actions;
    }

    protected function countForActivityPass($act_id){
        $count = JdhnEnrollment::find()
            ->where([
                'act_id' => $act_id
            ])
            ->andWhere([
                'in', 'enroll_state', [273, 276, 277]
            ])
            ->count();
        return $count;
    }

    protected function countForActivityEnroll($act_id) {
        $count = JdhnEnrollment::find()
            ->where([
                'act_id' => $act_id
            ])
            ->count();
        return $count;
    }

    protected function countForActivityComment($act_id){
        $count = JdhnActComment::find()
            ->where([
                'act_id' => $act_id
            ])
            ->count();
        return $count;
    }

    /**
     * @return ActiveDataProvider
     * 重写index的业务实现
     */
    public function actionIndex()
    {
//        $modelClass = $this->modelClass;
//        return new ActiveDataProvider([
//            'query' => $modelClass::find()->where([
//                'gender' => 1,
//            ]),
//            'pagination' => false,
//        ]);

        try {
            $activities = JdhnActivity::find()
                ->orderBy([
                    'act_id'=> SORT_DESC,
                ])
                ->all();

            $resultData = [];
            foreach($activities as $act){
                $actObj = [];
                $actObj['id'] = $act['act_id'];
                $actObj['title'] = $act['act_title'];
                $actObj['starttime'] = $act['act_beginTime'];
                $actObj['endtime'] = $act['act_endTime'];
                $actObj['read'] = $act['act_readCount'];
                $actObj['numberapplicants'] = $this->countForActivityEnroll($act['act_id']);
                $actObj['throughnumber'] = $this->countForActivityPass($act['act_id']);
                $actObj['commentCount'] = $this->countForActivityComment($act['act_id']);
                $actObj['place'] = $act['act_address'];
                $actObj['imgurl'] = $act['act_thumb'];
                $actObj['read'] = $act['act_readCount'];

                array_push($resultData, $actObj);
            }

            $responseData = new ResponseData(StatusCodeEnum::SUCCESS, $resultData, null, null);
//            $responseData = new ResponseData(StatusCodeEnum::SUCCESS, $activities, null, null);
        } catch (\Exception $e) {
            $responseData = new ResponseData($e->getCode(), null, $e->getMessage(), $e);
        }
        echo $_GET['callback'].'('.Json::encode($responseData->getResultArray()).');';
    }

    public function actionActiveList()
    {
        try {
            $activities = JdhnActivity::find()
                ->where([
                    'not in', 'act_state', [255, 256]
                ])
                ->orderBy([
                    'act_id'=> SORT_DESC,
                ])
                ->all();

            $resultData = [];
            foreach($activities as $act){
                $actObj = [];
                $actObj['id'] = $act['act_id'];
                $actObj['title'] = $act['act_title'];
                $actObj['starttime'] = $act['act_beginTime'];
                $actObj['endtime'] = $act['act_endTime'];
                $actObj['read'] = $act['act_readCount'];
                $actObj['numberapplicants'] = $this->countForActivityEnroll($act['act_id']);
                $actObj['throughnumber'] = $this->countForActivityPass($act['act_id']);
                $actObj['commentCount'] = $this->countForActivityComment($act['act_id']);
                $actObj['place'] = $act['act_address'];
                $actObj['imgurl'] = $act['act_thumb'];
                $actObj['read'] = $act['act_readCount'];

                array_push($resultData, $actObj);
            }

            $responseData = new ResponseData(StatusCodeEnum::SUCCESS, $resultData, null, null);
//            $responseData = new ResponseData(StatusCodeEnum::SUCCESS, $activities, null, null);
        } catch (\Exception $e) {
            $responseData = new ResponseData($e->getCode(), null, $e->getMessage(), $e);
        }
        echo $_GET['callback'].'('.Json::encode($responseData->getResultArray()).');';
    }

    public function actionInactiveList($limit, $offset){
        try {
            $activities = JdhnActivity::find()
                ->where([
                    'in', 'act_state', [255, 256]
                ])
                ->orderBy([
                    'act_id'=> SORT_DESC,
                ])
                ->limit($limit)
                ->offset($offset)
                ->all();

            $resultData = [];
            foreach($activities as $act){
                $actObj = [];
                $actObj['id'] = $act['act_id'];
                $actObj['title'] = $act['act_title'];
                $actObj['starttime'] = $act['act_beginTime'];
                $actObj['endtime'] = $act['act_endTime'];
                $actObj['read'] = $act['act_readCount'];
                $actObj['numberapplicants'] = $this->countForActivityEnroll($act['act_id']);
                $actObj['throughnumber'] = $this->countForActivityPass($act['act_id']);
                $actObj['commentCount'] = $this->countForActivityComment($act['act_id']);
                $actObj['place'] = $act['act_address'];
                $actObj['imgurl'] = $act['act_thumb'];
                $actObj['read'] = $act['act_readCount'];

                array_push($resultData, $actObj);
            }

            $responseData = new ResponseData(StatusCodeEnum::SUCCESS, $resultData, null, null);
//            $responseData = new ResponseData(StatusCodeEnum::SUCCESS, $activities, null, null);
        } catch (\Exception $e) {
            $responseData = new ResponseData($e->getCode(), null, $e->getMessage(), $e);
        }
        echo $_GET['callback'].'('.Json::encode($responseData->getResultArray()).');';
    }
}