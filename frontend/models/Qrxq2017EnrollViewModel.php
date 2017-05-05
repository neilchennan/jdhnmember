<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/3
 * Time: 17:10
 */

namespace frontend\models;

use Yii;
use common\models\Qrxq2017Enroll;
use yii\base\Exception;
use yii\base\InvalidCallException;
use yii\base\UnknownPropertyException;

class Qrxq2017EnrollViewModel extends Qrxq2017Enroll
{
    /**
     * @var string
     */
    private $genderStr;

    /**
     * @var string
     */
    private $createdAtStr;

    /**
     * @var string
     */
    private $modifiedAtStr;

    /**
     * @var \common\models\Qrxq2017Enroll
     */
    private $source;

    function __construct(Qrxq2017Enroll $src)
    {
        if (!isset($src) || empty($src)) {
            throw new Exception("Qrxq2017Enroll model source obj not set");
        }
        parent::__construct($src);

        $this->source = $src;

        $this->selfComplete();
    }

    private function selfComplete(){
        if (!isset($this->source) || empty($this->source)) {
            throw new Exception("Qrxq2017Enroll model source obj not set");
        }

        $this->genderStr = $this->source->gender == '1' ? Yii::t('common', 'Male') : Yii::t('common', 'Female');
        $this->createdAtStr = date("Y-m-d H:i:s",$this->source->created_at);
        $this->modifiedAtStr = date("Y-m-d H:i:s",$this->source->modified_at);
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
            'id_card_num' => Yii::t('app', 'id_card_num'),
            'created_at' => Yii::t('app', 'created_at'),
            'modified_at' => Yii::t('app', 'modified_at'),

            'genderStr' => Yii::t('app', 'genderStr'),
            'createdAtStr' => Yii::t('app', 'createdAtStr'),
            'modifiedAtStr' => Yii::t('app', 'modifiedAtStr'),
        ];
    }

    public function getGenderStr()
    {
        return $this->genderStr;
    }
    public function getCreatedAtStr()
    {
        return $this->createdAtStr;
    }
    public function getModifiedAtStr()
    {
        return $this->modifiedAtStr;
    }

//    public function get
//  不需要以下代码，因为yii会自动加载ActiveRecord相关属性
//    public function __get($property_name)              // 这里$name是属性名
//    {
//        $getter = 'get' . $property_name;            // getter函数的函数名
//        if (method_exists($this, $getter)) {
//            return $this->$getter();          // 调用了getter函数
//        } elseif (method_exists($this, 'set' . $property_name)) {
//            throw new InvalidCallException('Getting write-only property: '
//                . get_class($this) . '::' . $property_name);
//        } else {
//            if(isset($this->$property_name)){
//                return $this->$property_name;
//            }
//
//            throw new UnknownPropertyException('Getting unknown property: '
//                . get_class($this) . '::' . $property_name);
//        }
//    }
//
//    // $name是属性名，$value是拟写入的属性值
//    public function __set($property_name, $value)
//    {
//        $setter = 'set' . $property_name;             // setter函数的函数名
//        if (method_exists($this, $setter)) {
//            $this->$setter($value);          // 调用setter函数
//        } elseif (method_exists($this, 'get' . $property_name)) {
//            throw new InvalidCallException('Setting read-only property: ' .
//                get_class($this) . '::' . $property_name);
//        } else {
//            throw new UnknownPropertyException('Setting unknown property: '
//                . get_class($this) . '::' . $property_name);
//        }
//    }
}