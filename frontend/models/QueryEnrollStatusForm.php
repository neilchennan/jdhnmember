<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/9
 * Time: 17:05
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class QueryEnrollStatusForm extends Model
{
    /**
     * @var string
     */
    public $activity_name;
    /**
     * @var string
     */
    public $mobile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile'], 'required'],
            ['mobile','match','pattern'=>'/^1[0-9]{10}$/','message'=>'手机号格式不正确'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nickname' => Yii::t('app', 'Nickname'),
            'mobile' => Yii::t('app', 'Mobile'),
        ];
    }
}