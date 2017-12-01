<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/1
 * Time: 11:26
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class QueryMatchStatusForm extends Model
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
            'mobile' => Yii::t('app', 'Mobile'),
        ];
    }
}