<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "huxuan_summary".
 *
 * @property string $id uuid
 * @property string $male_num 男嘉宾编号
 * @property int $male_order 男选女顺位
 * @property string $female_num 女嘉宾编号
 * @property int $female_order 女选男顺位
 * @property int $male_score 男选女分数
 * @property int $female_score 女选男分数
 * @property int $total_score 总分数
 * @property string $description 描述
 * @property int $created_at 创建时间
 * @property int $modified_at 修改时间
 */
class HuxuanSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'huxuan_summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['male_order', 'female_order', 'male_score', 'female_score', 'total_score', 'created_at', 'modified_at'], 'integer'],
            [['id', 'male_num', 'female_num'], 'string', 'max' => 45],
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
            'male_num' => Yii::t('app', 'Male Num'),
            'male_order' => Yii::t('app', 'Male Order'),
            'female_num' => Yii::t('app', 'Female Num'),
            'female_order' => Yii::t('app', 'Female Order'),
            'male_score' => Yii::t('app', 'Male Score'),
            'female_score' => Yii::t('app', 'Female Score'),
            'total_score' => Yii::t('app', 'Total Score'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }
}
