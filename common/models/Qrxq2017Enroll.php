<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "qrxq2017_enroll".
 *
 * @property string $id uuid
 * @property string $name 姓名
 * @property string $nickname 昵称
 * @property int $age 年龄
 * @property int $gender 性别
 * @property string $mobile 手机号
 * @property string $id_card_nun 身份证号
 * @property int $created_at 创建时间
 * @property int $modified_at 修改时间
 */
class Qrxq2017Enroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qrxq2017_enroll';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['age', 'gender', 'created_at', 'modified_at'], 'integer'],
            [['id', 'name', 'nickname', 'mobile'], 'string', 'max' => 45],
            [['id_card_nun'], 'string', 'max' => 18],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'name' => Yii::t('app', 'name'),
            'nickname' => Yii::t('app', 'nickname'),
            'age' => Yii::t('app', 'age'),
            'gender' => Yii::t('app', 'gender'),
            'mobile' => Yii::t('app', 'mobile'),
            'id_card_nun' => Yii::t('app', 'id_card_nun'),
            'created_at' => Yii::t('app', 'created_at'),
            'modified_at' => Yii::t('app', 'modified_at'),
        ];
    }
}
