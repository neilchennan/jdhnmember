<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jdhn_keyword".
 *
 * @property int $kw_id
 * @property string $kw_group
 * @property string $kw_desc
 * @property string $kw_time
 *
 * @property JdhnEnrollment[] $jdhnEnrollments
 * @property JdhnEnrollment[] $jdhnEnrollments0
 * @property JdhnOrder[] $jdhnOrders
 * @property JdhnOrder[] $jdhnOrders0
 * @property JdhnSysMsgSend[] $jdhnSysMsgSends
 * @property JdhnUser[] $jdhnUsers
 */
class JdhnKeyword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jdhn_keyword';
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
            [['kw_group', 'kw_desc'], 'required'],
            [['kw_time'], 'safe'],
            [['kw_group'], 'string', 'max' => 20],
            [['kw_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kw_id' => Yii::t('app', 'Kw ID'),
            'kw_group' => Yii::t('app', 'Kw Group'),
            'kw_desc' => Yii::t('app', 'Kw Desc'),
            'kw_time' => Yii::t('app', 'Kw Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnEnrollments()
    {
        return $this->hasMany(JdhnEnrollment::className(), ['enroll_gender' => 'kw_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnEnrollments0()
    {
        return $this->hasMany(JdhnEnrollment::className(), ['enroll_state' => 'kw_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnOrders()
    {
        return $this->hasMany(JdhnOrder::className(), ['ord_payType' => 'kw_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnOrders0()
    {
        return $this->hasMany(JdhnOrder::className(), ['ord_state' => 'kw_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnSysMsgSends()
    {
        return $this->hasMany(JdhnSysMsgSend::className(), ['msg_state' => 'kw_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnUsers()
    {
        return $this->hasMany(JdhnUser::className(), ['u_gender' => 'kw_id']);
    }
}
