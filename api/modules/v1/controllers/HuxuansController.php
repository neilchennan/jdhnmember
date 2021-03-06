<?php

namespace api\modules\v1\controllers;

use common\models\Enroll;
use yii\data\ActiveDataProvider;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\RateLimiter;
use yii\rest\ActiveController;
use yii\web\Response;

class HuxuansController extends ActiveController
{
    public $modelClass = 'common\models\Huxuan';

    public function behaviors(){
        $behaviors = parent::behaviors();

        $behaviors['rateLimiter'] = [
            'class' => RateLimiter::className(),
            'enableRateLimitHeaders' => true,
        ];

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                /*下面是三种验证access_token方式*/
                //1.HTTP 基本认证: access token 当作用户名发送，应用在access token可安全存在API使用端的场景，例如，API使用端是运行在一台服务器上的程序。
                //HttpBasicAuth::className(),
                //2.OAuth 2: 使用者从认证服务器上获取基于OAuth2协议的access token，然后通过 HTTP Bearer Tokens 发送到API 服务器。
                //HttpBearerAuth::className(),
                //3.请求参数: access token 当作API URL请求参数发送，这种方式应主要用于JSONP请求，因为它不能使用HTTP头来发送access token
                //http://localhost/user/index/index?access-token=123
                QueryParamAuth::className(),
            ],
        ];

        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actions() {
        $actions = parent::actions();
        // 禁用""index,delete" 和 "create" 操作
//        unset($actions['index'],$actions['delete'], $actions['create']);
        unset($actions['index']);
        return $actions;
    }

    /**
     * @return ActiveDataProvider
     * 重写index的业务实现
     */
    public function actionIndex()
    {
        $modelClass = $this->modelClass;
        return new ActiveDataProvider([
            'query' => $modelClass::find()->where([
                'gender' => 1,
            ]),
            'pagination' => false,
        ]);
    }
}
