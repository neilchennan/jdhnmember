<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/7
 * Time: 15:28
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class CustomerCreateForm extends Model
{
    /**
     * @var string
     */
    public $my_nickname;

    /**
     * @var string
     */
    public $my_num;

    /**
     * @var string
     */
    public $opp_num_order1;

    /**
     * @var string
     */
    public $opp_num_order2;

    /**
     * @var string
     */
    public $opp_num_order3;

    /**
     * @var int
     */
    public $my_gender;

    /**
     * @var int
     */
    public $my_mobile_last4;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['my_nickname', 'my_num', 'opp_num_order1', 'my_gender', 'my_mobile_last4'], 'required'],
            [['opp_num_order1', 'opp_num_order2', 'opp_num_order3'], 'string'],
            [['my_mobile_last4'], 'integer',  'min' => 0001, 'max' => 9999],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'my_nickname' => Yii::t('app', 'My Nickname'),
            'my_num' => Yii::t('app', 'My Num'),
            'opp_num_order1' => Yii::t('app', 'Opp Num Order1'),
            'opp_num_order2' => Yii::t('app', 'Opp Num Order2'),
            'opp_num_order3' => Yii::t('app', 'Opp Num Order3'),
            'my_gender' => Yii::t('app', 'My Gender'),
            'my_mobile_last4'=> Yii::t('app', 'My Mobile Last4'),
        ];
    }
}