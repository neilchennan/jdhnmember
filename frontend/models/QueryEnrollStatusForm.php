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
    public $nickname;
    public $mobile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nickname', 'mobile'], 'required'],
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