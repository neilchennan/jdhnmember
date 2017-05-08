<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "huxuan_starts".
 *
 * @property string $id uuid
 * @property string $num 嘉宾编号
 * @property int $gender 嘉宾性别
 * @property int $times 被选择次数
 * @property int $score 总得分
 * @property int $rank 排名
 * @property string $description 描述
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
            [['id', 'num'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'num' => Yii::t('app', 'Num'),
            'gender' => Yii::t('app', 'Gender'),
            'times' => Yii::t('app', 'Times'),
            'score' => Yii::t('app', 'Score'),
            'rank' => Yii::t('app', 'Rank'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
