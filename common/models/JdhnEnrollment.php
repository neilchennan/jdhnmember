<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jdhn_enrollment".
 *
 * @property int $enroll_id
 * @property int $u_id
 * @property string $enroll_name
 * @property int $enroll_gender
 * @property string $enroll_birthday
 * @property string $enroll_school
 * @property string $enroll_work
 * @property int $enroll_height
 * @property int $act_id
 * @property string $enroll_signupTime
 * @property int $enroll_state
 * @property string $enroll_custFormInfo
 *
 * @property JdhnKeyword $enrollGender
 * @property JdhnKeyword $enrollState
 * @property JdhnUser $u
 * @property JdhnOrder[] $jdhnOrders
 * @property JdhnActivity $jdhnActivity
 */
class JdhnEnrollment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jdhn_enrollment';
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
            [['u_id', 'enroll_name', 'enroll_gender', 'enroll_birthday', 'enroll_school', 'enroll_height', 'act_id', 'enroll_custFormInfo'], 'required'],
            [['u_id', 'enroll_gender', 'enroll_height', 'act_id', 'enroll_state'], 'integer'],
            [['enroll_birthday', 'enroll_signupTime'], 'safe'],
            [['enroll_name'], 'string', 'max' => 30],
            [['enroll_school'], 'string', 'max' => 60],
            [['enroll_work'], 'string', 'max' => 255],
            [['enroll_custFormInfo'], 'string', 'max' => 2000],
            [['enroll_gender'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnKeyword::className(), 'targetAttribute' => ['enroll_gender' => 'kw_id']],
            [['enroll_state'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnKeyword::className(), 'targetAttribute' => ['enroll_state' => 'kw_id']],
            [['u_id'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnUser::className(), 'targetAttribute' => ['u_id' => 'u_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enroll_id' => Yii::t('app', 'Enroll ID'),
            'u_id' => Yii::t('app', 'U ID'),
            'enroll_name' => Yii::t('app', 'Enroll Name'),
            'enroll_gender' => Yii::t('app', 'Enroll Gender'),
            'enroll_birthday' => Yii::t('app', 'Enroll Birthday'),
            'enroll_school' => Yii::t('app', 'Enroll School'),
            'enroll_work' => Yii::t('app', 'Enroll Work'),
            'enroll_height' => Yii::t('app', 'Enroll Height'),
            'act_id' => Yii::t('app', 'Act ID'),
            'enroll_signupTime' => Yii::t('app', 'Enroll Signup Time'),
            'enroll_state' => Yii::t('app', 'Enroll State'),
            'enroll_custFormInfo' => Yii::t('app', 'Enroll Cust Form Info'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollGender()
    {
        return $this->hasOne(JdhnKeyword::className(), ['kw_id' => 'enroll_gender']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollState()
    {
        return $this->hasOne(JdhnKeyword::className(), ['kw_id' => 'enroll_state']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(JdhnUser::className(), ['u_id' => 'u_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnOrders()
    {
        return $this->hasMany(JdhnOrder::className(), ['enroll_id' => 'enroll_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnActivity()
    {
        return $this->hasOne(JdhnActivity::className(), ['act_id' => 'act_id']);
    }
}
