<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "qrxq2017_enroll".
 *
 * @property string $id uuid
 * @property int $applicant_role 报名者身份,1:男嘉宾,2:女嘉宾,0:志愿者
 * @property string $name 姓名
 * @property string $nickname 昵称
 * @property int $birth_year 出生年份
 * @property int $gender 性别,1:男,2:女
 * @property string $school 就读或毕业院校
 * @property int $highest_degree 最高学历,1:博士,2:硕士,3:本科
 * @property string $company_major 工作单位或专业
 * @property string $hometown 家乡
 * @property int $height 身高
 * @property string $contact 联系方式,可以是邮箱或者其他
 * @property string $mobile 手机号
 * @property string $weixin_id 微信号
 * @property string $id_card_num 身份证号
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
            [['name'], 'required'],
            ['name', 'string', 'min' => 0, 'max' => 45],
            ['nickname', 'string', 'min' => 0, 'max' => 45],
            ['school', 'string', 'min' => 0, 'max' => 45],
            [['id', 'name', 'nickname', 'mobile'], 'string', 'max' => 45],

            [['birth_year'], 'integer',  'min' => 1970, 'max' => 2017],
            [['height'], 'integer',  'min' => 100, 'max' => 299],
            ['mobile','match','pattern'=>'/^1[0-9]{10}$/','message'=>'手机号格式不正确'],
            ['id_card_num','match','pattern'=>'/^[0-9a-zA-Z]{18,18}$/','message'=>'身份证号必须是数字或字母,且为18位'],

            [['applicant_role', 'birth_year', 'gender', 'highest_degree', 'height', 'created_at', 'modified_at'], 'integer'],
            [['id', 'name', 'nickname', 'school', 'company_major', 'hometown', 'contact', 'mobile', 'weixin_id'], 'string', 'max' => 45],
            [['id_card_num'], 'string', 'max' => 18],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'applicant_role' => Yii::t('app', 'applicant_role'),
            'name' => Yii::t('app', 'name'),
            'nickname' => Yii::t('app', 'nickname'),
            'birth_year' => Yii::t('app', 'birth_year'),
            'gender' => Yii::t('app', 'gender'),
            'school' => Yii::t('app', 'school'),
            'highest_degree' => Yii::t('app', 'highest_degree'),
            'company_major' => Yii::t('app', 'company_major'),
            'hometown' => Yii::t('app', 'hometown'),
            'height' => Yii::t('app', 'height'),
            'contact' => Yii::t('app', 'contact'),
            'mobile' => Yii::t('app', 'mobile'),
            'weixin_id' => Yii::t('app', 'weixin_id'),
            'id_card_num' => Yii::t('app', 'id_card_num'),
            'created_at' => Yii::t('app', 'created_at'),
            'modified_at' => Yii::t('app', 'modified_at'),
        ];
    }
}
