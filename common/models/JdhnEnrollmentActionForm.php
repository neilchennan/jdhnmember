<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/6/13
 * Time: 11:06
 */

namespace common\models;

use Yii;
use yii\base\Model;

class JdhnEnrollmentActionForm extends Model
{
    /**
     * @var string
     */
    public $ids4Approve;

    /**
     * @var string
     */
    public $ids4Deny;

    /**
     * @var string
     */
    public $ids4ReturnFee;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ids4Approve', 'ids4Deny', 'ids4ReturnFee'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ids4Approve' => Yii::t('app', 'Ids For Approve'),
            'ids4Deny' => Yii::t('app', 'Ids For Deny'),
            'ids4ReturnFee' => Yii::t('app', 'Ids For Return Fee'),
        ];
    }
}