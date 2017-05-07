<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "huxuan".
 *
 * @property string $id uuid
 * @property string $from_num 选择一方编号
 * @property string $to_num 被选择一方编号
 * @property int $order 选择顺位:1:第一选择,2:第二选择...
 * @property int $gender 选择方性别
 * @property int $score 互选得分
 * @property string $description 描述
 * @property int $created_at 创建时间
 * @property int $modified_at 修改时间
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
            [['id', 'from_num', 'to_num'], 'string', 'max' => 45],
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
}
