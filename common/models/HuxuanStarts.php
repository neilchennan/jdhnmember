<?php

namespace common\models;

use common\helper\JdhnCommonHelper;
use Yii;

/**
 * This is the model class for table "huxuan_starts".
 *
 * @property string $id uuid
 * @property string $activity_id 关联活动id
 * @property string $num 嘉宾编号
 * @property int $gender 嘉宾性别
 * @property int $times 被选择次数
 * @property int $score 总得分
 * @property int $rank 排名
 * @property string $description 描述
 *
 * @property Activity $activity
 */
class HuxuanStarts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'huxuan_starts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['gender', 'times', 'score', 'rank'], 'integer'],
            [['id', 'activity_id', 'num'], 'string', 'max' => 45],
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
            'num' => Yii::t('app', 'Num'),
            'gender' => Yii::t('app', 'Gender'),
            'times' => Yii::t('app', 'Times'),
            'score' => Yii::t('app', 'Score'),
            'rank' => Yii::t('app', 'Rank'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['id' => 'activity_id']);
    }

    /**
     * @return string
     */
    public function getDetailMessage(){
        $msgStr = Yii::t('app', '{gender} {num} is selected {times} times.', [
            'gender' => JdhnCommonHelper::getGenderByIntValue($this->gender),
            'num' => $this->num,
            'times' => $this->times,
        ]);
        $returnStr = $msgStr;
        return $returnStr;
    }
}
