<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    //添加重复密码字段
    public $repassword;

    //添加验证码字段
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('common', 'This username has already been taken.')],
//            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'string', 'min' => 6, 'max' => 16],
            ['username', 'match', 'pattern'=>'/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u',
                'message'=> Yii::t('common', 'username must contain letters, Chinese characters, numbers, underscores, and cannot be started with numbers and underscores.')],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('common', 'This email address has already been taken.')],

            [['password','repassword'], 'required'],
            [['password','repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password','message'=>Yii::t('common', 'Two passwords are inconsistent!')],

            ['verifyCode', 'required'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'username'),
            'email' => Yii::t('common', 'email'),
            'password' => Yii::t('common', 'password'),
            'repassword' => Yii::t('common', 'repassword'),
            'verifyCode' => Yii::t('common', 'verifyCode'),
        ];
    }
}
