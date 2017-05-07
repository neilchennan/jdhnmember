<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "huxuan_score_factor".
 *
 * @property string $id uuid
 * @property int $gender 选择方性别
 * @property int $order 选择顺位:1:第一选择,2:第二选择...
 * @property int $factor 因子
 * @property string $description 描述
 * @property int $created_at 创建时间
 * @property int $modified_at 修改时间
 */
class HuxuanScoreFactor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'huxuan_score_factor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['gender', 'order', 'factor', 'created_at', 'modified_at'], 'integer'],
            [['id', 'description'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'gender' => Yii::t('app', 'Gender'),
            'order' => Yii::t('app', 'Order'),
            'factor' => Yii::t('app', 'Factor'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }
}
