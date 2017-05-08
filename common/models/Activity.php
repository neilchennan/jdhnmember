<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property string $id uuid
 * @property string $activity_name 活动名称
 * @property string $activity_description 活动简介
 * @property int $start_time 开始时间
 * @property int $end_time 结束时间
 * @property int $is_default 是否为当前默认活动
 * @property string $activity_address 活动地址
 * @property string $activity_traffic 活动交通
 * @property string $description 描述
 * @property int $created_at 创建时间
 * @property int $modified_at 最后修改时间
 * @property string $created_by 创建者id
 * @property string $modified_by 最后修改者id
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['is_default', 'created_at', 'modified_at'], 'integer'],
            [['id', 'activity_name', 'created_by', 'modified_by'], 'string', 'max' => 45],
            [['activity_description', 'activity_address', 'activity_traffic', 'description'], 'string', 'max' => 255],
            //do not need check
//            [['start_time', 'end_time', ], 'date','format' => 'Y-m-d H:i:s'],
//            [['start_time', 'end_time', ], 'datetime'],
            //使用filter来处理表单中时间的格式
            ['start_time',  'filter', 'filter' => function(){
                return strtotime($this->start_time);
            }],
            ['end_time',  'filter', 'filter' => function(){
                return strtotime($this->end_time);
            }],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'activity_name' => Yii::t('app', 'Activity Name'),
            'activity_description' => Yii::t('app', 'Activity Description'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'is_default' => Yii::t('app', 'Is Default'),
            'activity_address' => Yii::t('app', 'Activity Address'),
            'activity_traffic' => Yii::t('app', 'Activity Traffic'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
        ];
    }
}
