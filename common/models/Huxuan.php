<?php

namespace common\models;

use common\helper\JdhnCommonHelper;
use Yii;

/**
 * This is the model class for table "huxuan".
 *
 * @property string $id uuid
 * @property string $activity_id 关联活动id
 * @property string $from_num 选择一方编号
 * @property string $to_num 被选择一方编号
 * @property int $order 选择顺位:1:第一选择,2:第二选择...
 * @property int $gender 选择方性别
 * @property int $score 互选得分
 * @property string $description 描述
 * @property int $created_at 创建时间
 * @property int $modified_at 修改时间
 *
 * @property Activity $activity
 */
class Huxuan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'huxuan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['order', 'gender', 'score', 'created_at', 'modified_at'], 'integer'],
            [['id', 'activity_id', 'from_num', 'to_num'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::className(), 'targetAttribute' => ['activity_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'activity_id' => Yii::t('app', 'Activity ID'),
            'from_num' => Yii::t('app', 'From Num'),
            'to_num' => Yii::t('app', 'To Num'),
            'order' => Yii::t('app', 'Order'),
            'gender' => Yii::t('app', 'Gender'),
            'score' => Yii::t('app', 'Score'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['id' => 'activity_id']);
    }

    public function getDetailMessage(){
        $genderStr = JdhnCommonHelper::getGenderByIntValue($this->gender);
        $msgStr = Yii::t('app', ' Num{from} selected Num{to} in order{order}, score:{score} .', [
            'from' => $this->from_num,
            'to' => $this->to_num,
            'order' => $this->order,
            'score' => $this->score,
        ]);
        $returnStr = $genderStr.$msgStr;
        return $returnStr;
    }
}
