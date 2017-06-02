<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jdhn_activity".
 *
 * @property int $act_id
 * @property string $act_title
 * @property string $act_detail
 * @property string $act_richText
 * @property string $act_richText_html
 * @property int $act_city
 * @property string $act_address
 * @property int $act_p_uLimit
 * @property int $act_p_dLimit
 * @property string $act_beginTime
 * @property string $act_endTime
 * @property string $act_createTime
 * @property int $act_type
 * @property int $act_state
 * @property double $act_price
 * @property int $act_fee
 * @property string $act_thumb
 * @property string $act_photos
 * @property string $act_signBeginTime
 * @property string $act_signEndTime
 * @property int $act_readCount
 * @property double $act_mbPrice
 * @property string $act_customForm
 * @property string $act_title_idx
 * @property string $act_richText_idx
 * @property string $act_address_idx
 * @property string $act_notice
 * @property JdhnKeyword $state_keyword
 * @property JdhnKeyword $city_keyword
 */
class JdhnActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jdhn_activity';
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
            [['act_title', 'act_detail', 'act_richText', 'act_beginTime', 'act_type', 'act_thumb', 'act_photos', 'act_mbPrice'], 'required'],
            [['act_richText', 'act_richText_html', 'act_customForm', 'act_richText_idx', 'act_notice'], 'string'],
            [['act_city', 'act_p_uLimit', 'act_p_dLimit', 'act_type', 'act_state', 'act_fee', 'act_readCount'], 'integer'],
            [['act_beginTime', 'act_endTime', 'act_createTime', 'act_signBeginTime', 'act_signEndTime'], 'safe'],
            [['act_price', 'act_mbPrice'], 'number'],
            [['act_title'], 'string', 'max' => 60],
            [['act_detail'], 'string', 'max' => 225],
            [['act_address'], 'string', 'max' => 100],
            [['act_thumb'], 'string', 'max' => 255],
            [['act_photos'], 'string', 'max' => 1000],
            [['act_title_idx'], 'string', 'max' => 120],
            [['act_address_idx'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'act_id' => Yii::t('app', 'Act ID'),
            'act_title' => Yii::t('app', 'Act Title'),
            'act_detail' => Yii::t('app', 'Act Detail'),
            'act_richText' => Yii::t('app', 'Act Rich Text'),
            'act_richText_html' => Yii::t('app', 'Act Rich Text Html'),
            'act_city' => Yii::t('app', 'Act City'),
            'act_address' => Yii::t('app', 'Act Address'),
            'act_p_uLimit' => Yii::t('app', 'Act P U Limit'),
            'act_p_dLimit' => Yii::t('app', 'Act P D Limit'),
            'act_beginTime' => Yii::t('app', 'Act Begin Time'),
            'act_endTime' => Yii::t('app', 'Act End Time'),
            'act_createTime' => Yii::t('app', 'Act Create Time'),
            'act_type' => Yii::t('app', 'Act Type'),
            'act_state' => Yii::t('app', 'Act State'),
            'act_price' => Yii::t('app', 'Act Price'),
            'act_fee' => Yii::t('app', 'Act Fee'),
            'act_thumb' => Yii::t('app', 'Act Thumb'),
            'act_photos' => Yii::t('app', 'Act Photos'),
            'act_signBeginTime' => Yii::t('app', 'Act Sign Begin Time'),
            'act_signEndTime' => Yii::t('app', 'Act Sign End Time'),
            'act_readCount' => Yii::t('app', 'Act Read Count'),
            'act_mbPrice' => Yii::t('app', 'Act Mb Price'),
            'act_customForm' => Yii::t('app', 'Act Custom Form'),
            'act_title_idx' => Yii::t('app', 'Act Title Idx'),
            'act_richText_idx' => Yii::t('app', 'Act Rich Text Idx'),
            'act_address_idx' => Yii::t('app', 'Act Address Idx'),
            'act_notice' => Yii::t('app', 'Act Notice'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState_keyword()
    {
        return $this->hasOne(JdhnKeyword::className(), ['kw_id' => 'act_state']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity_keyword()
    {
        return $this->hasOne(JdhnKeyword::className(), ['kw_id' => 'act_city']);
    }
}
