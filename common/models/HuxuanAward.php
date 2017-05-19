<?php

namespace common\models;

use common\helper\JdhnCommonHelper;
use Yii;

/**
 * This is the model class for table "huxuan_award".
 *
 * @property string $id uuid-等同summaryid
 * @property string $activity_id 关联活动id
 * @property string $male_num 男嘉宾编号
 * @property int $male_order 男选女顺位
 * @property string $female_num 女嘉宾编号
 * @property int $female_order 女选男顺位
 * @property int $total_score 总分数
 *
 * @property Activity $activity
 */
class HuxuanAward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'huxuan_award';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['male_order', 'female_order', 'total_score'], 'integer'],
            [['id', 'activity_id', 'male_num', 'female_num'], 'string', 'max' => 45],
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
            'male_num' => Yii::t('app', 'Male Num'),
            'male_order' => Yii::t('app', 'Male Order'),
            'female_num' => Yii::t('app', 'Female Num'),
            'female_order' => Yii::t('app', 'Female Order'),
            'total_score' => Yii::t('app', 'Total Score'),
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
        $msgStr = Yii::t('app', 'Male{male_num}({male_order_roma}) <=> Female{female_num}({female_order_roma}), Total Score:{total_score}', [
            'male_num' => $this->male_num,
            'female_num' => $this->female_num,
            'total_score' => $this->total_score,
            'male_order_roma' => JdhnCommonHelper::getRomaNumberByIntValue($this->male_order),
            'female_order_roma' => JdhnCommonHelper::getRomaNumberByIntValue($this->female_order),
        ]);
        $returnStr = $msgStr;
        return $returnStr;
    }
}
