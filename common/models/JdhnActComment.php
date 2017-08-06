<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jdhn_actComment".
 *
 * @property int $acm_id
 * @property int $u_id
 * @property int $act_id
 * @property string $acm_text
 * @property string $acm_time
 * @property int $acm_state
 *
 * @property JdhnUser $u
 */
class JdhnActComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jdhn_actComment';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id', 'act_id', 'acm_text'], 'required'],
            [['u_id', 'act_id', 'acm_state'], 'integer'],
            [['acm_time'], 'safe'],
            [['acm_text'], 'string', 'max' => 1000],
            [['u_id'], 'exist', 'skipOnError' => true, 'targetClass' => JdhnUser::className(), 'targetAttribute' => ['u_id' => 'u_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'acm_id' => Yii::t('app', 'Acm ID'),
            'u_id' => Yii::t('app', 'U ID'),
            'act_id' => Yii::t('app', 'Act ID'),
            'acm_text' => Yii::t('app', 'Acm Text'),
            'acm_time' => Yii::t('app', 'Acm Time'),
            'acm_state' => Yii::t('app', 'Acm State'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(JdhnUser::className(), ['u_id' => 'u_id']);
    }
}
