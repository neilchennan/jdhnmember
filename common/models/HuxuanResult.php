<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "huxuan_result".
 *
 * @property string $id uuid
 * @property string $activity_id 活动id
 * @property int $gender 被选择方性别
 * @property string $to_num 被选择一方编号
 * @property string $from_nums 选择方的集合
 * @property string $description 描述
 *
 * @property Activity $activity
 */
class HuxuanResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'huxuan_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['gender'], 'integer'],
            [['id', 'activity_id', 'to_num', 'from_nums'], 'string', 'max' => 45],
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
            'gender' => Yii::t('app', 'Gender'),
            'to_num' => Yii::t('app', 'To Num'),
            'from_nums' => Yii::t('app', 'From Nums'),
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
}
