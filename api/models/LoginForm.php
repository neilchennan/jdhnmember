<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/16
 * Time: 14:45
 */

namespace api\models;

use common\models\User;
use common\service\UserService;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    /**
     * @var string
     */
    public $username;
    /**
     * @var string
     */
    public $password;

    /**
     * @var User
     */
    private $_user;

    const GET_ACCESS_TOKEN = 'generate_access_token';

    public function init ()
    {
        parent::init();
        $this->on(self::GET_ACCESS_TOKEN, [$this, 'onGenerateAccessToken']);
    }

    /**
     * 登录校验成功后，为用户生成新的token
     * 如果token失效，则重新生成token
     */
    public function onGenerateAccessToken ()
    {
//        if (!User::apiTokenIsValid($this->_user->access_token)) {
//            $this->_user->generateApiToken();
//            $this->_user->save(false);
//        }
        if (!UserService::accessTokenIsValid($this->_user->access_token)){
            UserService::generateAccessToken($this->_user);
        }
    }

    /**
     * @inheritdoc
     * 对客户端表单数据进行验证的rule
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * 自定义的密码认证方法
     * @param $attribute
     * @param $params
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->_user = $this->getUser();
            if (!$this->_user || !$this->_user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名或密码错误.');
            }
        }
    }

    /**
     * 根据用户名获取用户的认证信息
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'username'),
            'password' => Yii::t('app', 'password'),
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $this->trigger(self::GET_ACCESS_TOKEN);
            return $this->_user;
        } else {
            return null;
        }
    }

}