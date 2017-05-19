<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/19
 * Time: 19:25
 */

namespace common\models;

use Yii;
use yii\base\Model;

class QueryHuxuanForm extends Model
{
    public $gender;
    public $from_or_to;
    public $activity_id;
    public $num;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_or_to', 'gender',], 'integer'],
            [['num', 'activity_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'num' => Yii::t('app', 'My Num'),
            'gender' => Yii::t('app', 'My Gender'),
            'from_or_to' => Yii::t('app', 'From Or To'),
            'activity_id' => Yii::t('app', 'Activity Id'),
        ];
    }
}