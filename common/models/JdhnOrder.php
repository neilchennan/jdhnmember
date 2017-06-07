<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jdhn_order".
 *
 * @property string $ord_id
 * @property int $act_id
 * @property int $enroll_id
 * @property int $u_id
 * @property int $ord_payType
 * @property string $ord_time
 * @property string $ord_payTime
 * @property string $ord_refundTime
 * @property int $ord_state
 * @property string $ali_trade_no
 * @property string $ali_trade_status
 * @property string $ali_buyer_id
 * @property string $ali_buyer_email
 * @property double $ali_total_fee
 * @property string $ali_gmt_create
 * @property string $ali_gmt_payment
 * @property string $ali_refund_status
 * @property string $ali_gmt_refund
 * @property string $wechat_openid
 * @property int $wechat_total_fee
 * @property string $wechat_fee_type
 * @property string $wechat_bank_type
 * @property string $wechat_transaction_id
 * @property string $wechat_time_end
 * @property double $ord_fee
 * @property string $ord_detail
 *
 * @property JdhnEnrollment $enroll
 * @property JdhnKeyword $ordPayType
 * @property JdhnKeyword $ordState
 * @property JdhnUser $u
 * @property JdhnOrderComment[] $jdhnOrderComments
 * @property JdhnActivity $jdhnActivity
 */
class JdhnOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jdhn_order';
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
            [['ord_id', 'act_id', 'enroll_id', 'u_id', 'ord_fee'], 'required'],
            [['act_id', 'enroll_id', 'u_id', 'ord_payType', 'ord_state', 'wechat_total_fee'], 'integer'],
            [['ord_time', 'ord_payTime', 'ord_refundTime', 'ali_gmt_create', 'ali_gmt_payment', 'ali_gmt_refund'], 'safe'],
            [['ali_total_fee', 'ord_fee'], 'number'],
            [['ord_id', 'ali_buyer_id', 'wechat_transaction_id'], 'string', 'max' => 50],
            [['ali_trade_no'], 'string', 'max' => 100],
            [['ali_trade_status', 'ali_refund_status', 'wechat_bank_type', 'wechat_time_end'], 'string', 'max' => 30],
            [['ali_buyer_email'], 'string', 'max' => 120],
            [['wechat_openid'], 'string', 'max' => 200],
            [['wechat_fee_type'], 'string', 'max' => 20],
            [['ord_detail'], 'string', 'max' => 512],
            [['enroll_id'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnEnrollment::className(), 'targetAttribute' => ['enroll_id' => 'enroll_id']],
            [['ord_payType'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnKeyword::className(), 'targetAttribute' => ['ord_payType' => 'kw_id']],
            [['ord_state'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnKeyword::className(), 'targetAttribute' => ['ord_state' => 'kw_id']],
            [['u_id'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnUser::className(), 'targetAttribute' => ['u_id' => 'u_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ord_id' => Yii::t('app', 'Ord ID'),
            'act_id' => Yii::t('app', 'Act ID'),
            'enroll_id' => Yii::t('app', 'Enroll ID'),
            'u_id' => Yii::t('app', 'U ID'),
            'ord_payType' => Yii::t('app', 'Ord Pay Type'),
            'ord_time' => Yii::t('app', 'Ord Time'),
            'ord_payTime' => Yii::t('app', 'Ord Pay Time'),
            'ord_refundTime' => Yii::t('app', 'Ord Refund Time'),
            'ord_state' => Yii::t('app', 'Ord State'),
            'ali_trade_no' => Yii::t('app', 'Ali Trade No'),
            'ali_trade_status' => Yii::t('app', 'Ali Trade Status'),
            'ali_buyer_id' => Yii::t('app', 'Ali Buyer ID'),
            'ali_buyer_email' => Yii::t('app', 'Ali Buyer Email'),
            'ali_total_fee' => Yii::t('app', 'Ali Total Fee'),
            'ali_gmt_create' => Yii::t('app', 'Ali Gmt Create'),
            'ali_gmt_payment' => Yii::t('app', 'Ali Gmt Payment'),
            'ali_refund_status' => Yii::t('app', 'Ali Refund Status'),
            'ali_gmt_refund' => Yii::t('app', 'Ali Gmt Refund'),
            'wechat_openid' => Yii::t('app', 'Wechat Openid'),
            'wechat_total_fee' => Yii::t('app', 'Wechat Total Fee'),
            'wechat_fee_type' => Yii::t('app', 'Wechat Fee Type'),
            'wechat_bank_type' => Yii::t('app', 'Wechat Bank Type'),
            'wechat_transaction_id' => Yii::t('app', 'Wechat Transaction ID'),
            'wechat_time_end' => Yii::t('app', 'Wechat Time End'),
            'ord_fee' => Yii::t('app', 'Ord Fee'),
            'ord_detail' => Yii::t('app', 'Ord Detail'),
            //added by Neil
            'u' => Yii::t('app', 'U Nick Name'),
            'jdhnActivity' => Yii::t('app', 'Activity Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnroll()
    {
        return $this->hasOne(JdhnEnrollment::className(), ['enroll_id' => 'enroll_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdPayType()
    {
        return $this->hasOne(JdhnKeyword::className(), ['kw_id' => 'ord_payType']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdState()
    {
        return $this->hasOne(JdhnKeyword::className(), ['kw_id' => 'ord_state']);
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
    public function getJdhnOrderComments()
    {
        return $this->hasMany(JdhnOrderComment::className(), ['ord_id' => 'ord_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJdhnActivity()
    {
        return $this->hasOne(JdhnActivity::className(), ['act_id' => 'act_id']);
    }
}
