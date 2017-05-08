<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "huxuan_award".
 *
 * @property string $id uuid-等同summaryid
 * @property string $male_num 男嘉宾编号
 * @property string $female_num 女嘉宾编号
 * @property int $total_score 总分数
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
            [['total_score'], 'integer'],
            [['id', 'male_num', 'female_num'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'male_num' => Yii::t('app', 'Male Num'),
            'female_num' => Yii::t('app', 'Female Num'),
            'total_score' => Yii::t('app', 'Total Score'),
        ];
    }
}
