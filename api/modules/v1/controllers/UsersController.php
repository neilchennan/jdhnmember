<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/16
 * Time: 14:33
 */

namespace api\modules\v1\controllers;

use common\models\User;
use Yii;
use api\models\LoginForm;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\IdentityInterface;

class UsersController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        return ArrayHelper::merge (parent::behaviors(), [
            'authenticator' => [
                'class' => QueryParamAuth::className(),
                'optional' => [
                    'login',
                    'user-profile',
                ],
            ]
        ] );
    }

    /**
     * 登录
     */
    public function actionLogin ()
    {
        $model = new LoginForm();
        $model->setAttributes(Yii::$app->request->post());
        if ($user = $model->login()) {
            if ($user instanceof IdentityInterface) {
                return $user->access_token;
            } else {
                return $user->errors;
            }
        } else {
            return $model->errors;
        }
    }

    /**
     * 获取用户信息
     */
    public function actionUserProfile ($token)
    {
        // 到这一步，token都认为是有效的了
        // 下面只需要实现业务逻辑即可，下面仅仅作为案例，比如你可能需要关联其他表获取用户信息等等
        $user = User::findIdentityByAccessToken($token);
        return [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
        ];
    }
}