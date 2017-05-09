<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "enroll".
 *
 * @property string $id uuid
 * @property string $activity_id 关联活动id
 * @property int $applicant_role 报名者身份,1:男嘉宾,2:女嘉宾,0:志愿者
 * @property string $nickname 昵称
 * @property string $birth_year 出生年份
 * @property int $gender 性别,1:男,2:女
 * @property string $school 就读或毕业院校
 * @property int $highest_degree 最高学历,1:博士,2:硕士,3:本科
 * @property string $company_major 工作单位或专业
 * @property string $hometown 家乡
 * @property int $height 身高
 * @property string $contact 联系方式,可以是邮箱或者其他
 * @property string $name 姓名
 * @property string $mobile 手机号
 * @property string $weixin_id 微信号
 * @property string $id_card_num 身份证号
 * @property int $status 状态,1:报名成功,2:报名失败
 * @property string $remark 备注
 * @property int $created_at 创建时间
 * @property int $modified_at 修改时间
 *
 * @property Activity $activity
 */
class Enroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enroll';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'activity_id', 'applicant_role', 'nickname', 'birth_year', 'gender', 'school', 'highest_degree', 'company_major', 'hometown', 'height', 'contact', 'name', 'mobile', 'weixin_id'], 'required'],
            [['applicant_role', 'gender', 'highest_degree', 'height', 'status', 'created_at', 'modified_at'], 'integer'],
            [['birth_year'], 'integer'],
            [['id', 'activity_id', 'nickname', 'school', 'company_major', 'hometown', 'contact', 'name', 'mobile', 'weixin_id'], 'string', 'max' => 45],
            [['id_card_num'], 'string', 'max' => 18],
            [['remark'], 'string', 'max' => 255],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::className(), 'targetAttribute' => ['activity_id' => 'id']],
            //检查数据库不重复
            ['nickname', 'unique', 'targetClass'=>self::className(), 'message' => Yii::t('app', 'This nickname is already used.')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'activity_id' => Yii::t('app', 'Activity ID'),
            'applicant_role' => Yii::t('app', 'Applicant Role'),
            'nickname' => Yii::t('app', 'Nickname'),
            'birth_year' => Yii::t('app', 'Birth Year'),
            'gender' => Yii::t('app', 'Gender'),
            'school' => Yii::t('app', 'School'),
            'highest_degree' => Yii::t('app', 'Highest Degree'),
            'company_major' => Yii::t('app', 'Company Major'),
            'hometown' => Yii::t('app', 'Hometown'),
            'height' => Yii::t('app', 'Height'),
            'contact' => Yii::t('app', 'Contact'),
            'name' => Yii::t('app', 'Name'),
            'mobile' => Yii::t('app', 'Mobile'),
            'weixin_id' => Yii::t('app', 'Weixin ID'),
            'id_card_num' => Yii::t('app', 'Id Card Num'),
            'status' => Yii::t('app', 'Status'),
            'remark' => Yii::t('app', 'Remark'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['id' => 'activity_id']);
    }
}
