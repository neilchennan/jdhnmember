<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jdhn_user".
 *
 * @property int $u_id
 * @property string $u_pwd
 * @property string $u_realName
 * @property string $u_wechat3
 * @property string $u_wechat2
 * @property string $u_nickName 昵称
 * @property string $u_portrait
 * @property string $u_mobile
 * @property string $u_regTime
 * @property int $u_gender
 * @property int $u_academic
 * @property string $u_school
 * @property string $u_city
 * @property int $u_state
 * @property string $u_birthday
 * @property int $u_salary
 * @property int $u_height
 * @property string $u_work
 * @property string $u_idCardNo
 * @property string $u_academicImg
 * @property string $u_idCardImg0
 * @property string $u_idCardImg1
 * @property string $u_workerImg
 * @property string $u_jpush
 * @property string $u_comment
 *
 * @property JdhnActComment[] $jdhnActComments
 * @property JdhnEnrollment[] $jdhnEnrollments
 * @property JdhnOrder[] $jdhnOrders
 * @property JdhnKeyword $u_gender_keyword
 * @property JdhnKeyword $u_academic_keyword
 * @property JdhnKeyword $u_salary_keyword
 */
class JdhnUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jdhn_user';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_pwd', 'u_mobile', 'u_comment'], 'required'],
            [['u_regTime', 'u_birthday'], 'safe'],
            [['u_gender', 'u_academic', 'u_state', 'u_salary', 'u_height'], 'integer'],
            [['u_comment'], 'string'],
            [['u_pwd', 'u_wechat3', 'u_wechat2'], 'string', 'max' => 550],
            [['u_realName', 'u_nickName', 'u_jpush'], 'string', 'max' => 40],
            [['u_portrait', 'u_work', 'u_academicImg', 'u_idCardImg0', 'u_idCardImg1', 'u_workerImg'], 'string', 'max' => 255],
            [['u_mobile'], 'string', 'max' => 30],
            [['u_school', 'u_city'], 'string', 'max' => 60],
            [['u_idCardNo'], 'string', 'max' => 31],
            [['u_gender'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnKeyword::className(), 'targetAttribute' => ['u_gender' => 'kw_id']],
            [['u_academic'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnKeyword::className(), 'targetAttribute' => ['u_academic' => 'kw_id']],
            [['u_salary'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnKeyword::className(), 'targetAttribute' => ['u_salary' => 'kw_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => Yii::t('app', 'U ID'),
            'u_pwd' => Yii::t('app', 'U Pwd'),
            'u_realName' => Yii::t('app', 'U Real Name'),
            'u_wechat3' => Yii::t('app', 'U Wechat3'),
            'u_wechat2' => Yii::t('app', 'U Wechat2'),
            'u_nickName' => Yii::t('app', 'U Nick Name'),
            'u_portrait' => Yii::t('app', 'U Portrait'),
            'u_mobile' => Yii::t('app', 'U Mobile'),
            'u_regTime' => Yii::t('app', 'U Reg Time'),
            'u_gender' => Yii::t('app', 'U Gender'),
            'u_academic' => Yii::t('app', 'U Academic'),
            'u_school' => Yii::t('app', 'U School'),
            'u_city' => Yii::t('app', 'U City'),
            'u_state' => Yii::t('app', 'U State'),
            'u_birthday' => Yii::t('app', 'U Birthday'),
            'u_salary' => Yii::t('app', 'U Salary'),
            'u_height' => Yii::t('app', 'U Height'),
            'u_work' => Yii::t('app', 'U Work'),
            'u_idCardNo' => Yii::t('app', 'U Id Card No'),
            'u_academicImg' => Yii::t('app', 'U Academic Img'),
            'u_idCardImg0' => Yii::t('app', 'U Id Card Img0'),
            'u_idCardImg1' => Yii::t('app', 'U Id Card Img1'),
            'u_workerImg' => Yii::t('app', 'U Worker Img'),
            'u_jpush' => Yii::t('app', 'U Jpush'),
            'u_comment' => Yii::t('app', 'U Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnActComments()
    {
        return $this->hasMany(JdhnActComment::className(), ['u_id' => 'u_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnEnrollments()
    {
        return $this->hasMany(JdhnEnrollment::className(), ['u_id' => 'u_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnOrders()
    {
        return $this->hasMany(JdhnOrder::className(), ['u_id' => 'u_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU_gender_keyword()
    {
        return $this->hasOne(JdhnKeyword::className(), ['kw_id' => 'u_gender']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU_academic_keyword()
    {
        return $this->hasOne(JdhnKeyword::className(), ['kw_id' => 'u_academic']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU_salary_keyword()
    {
        return $this->hasOne(JdhnKeyword::className(), ['kw_id' => 'u_salary']);
    }
}
