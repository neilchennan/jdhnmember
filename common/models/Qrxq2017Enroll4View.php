<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/4
 * Time: 23:01
 */

namespace common\models;

use Yii;
use common\helper\JdhnCommonHelper;
use yii\base\Object;
use yii\db\ActiveRecord;

class Qrxq2017Enroll4View extends Qrxq2017Enroll
{
    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $nickname;
    /**
     * @var string
     */
    public $applicant_role;
    public function setApplicant_role($value){
        $this->applicant_role = JdhnCommonHelper::getApplicantRoleByIntValue($value);
    }
    public function getApplicant_role(){
        return $this->applicant_role;
    }
    /**
     * @var int
     */
    public $birth_year;
    /**
     * @var int
     */
    public $age;
    public function setAge($value){
        $this->age = $value;
    }
    public function getAge(){
        return $this->age;
    }
    /**
     * @var string
     */
    public $gender;
    public function setGender($value){
        $this->gender = JdhnCommonHelper::getGenderByIntValue($value);
    }
    public function getGender(){
        return $this->gender;
    }
    /**
     * @var string
     */
    public $school;
    /**
     * @var string
     */
    public $highest_degree;
    public function setHighest_degree($value){
        $this->highest_degree = JdhnCommonHelper::getHighestDegreeByIntValue($value);
    }
    public function getHighest_degree(){
        return $this->highest_degree;
    }
    /**
     * @var string
     */
    public $company_major;
    /**
     * @var string
     */
    public $hometown;
    /**
     * @var int
     */
    public $height;
    /**
     * @var string
     */
    public $contact;
    /**
     * @var string
     */
    public $mobile;
    /**
     * @var string
     */
    public $weixin_id;
    /**
     * @var string
     */
    public $id_card_num;
    /**
     * @var string
     */
    public $created_at;
    public function setCreated_at($value){
        $this->created_at = date("Y-m-d H:i:s",$value);
    }
    public function getCreated_at(){
        return $this->created_at;
    }
    /**
     * @var string
     */
    public $modified_at;
    public function setModified_at($value){
        $this->modified_at = date("Y-m-d H:i:s",$value);
    }
    public function getModified_at(){
        return $this->modified_at;
    }

    public function __construct($config = [])
    {
        parent::__construct($config);

        if (is_a($config, Qrxq2017Enroll::className())){
            $this->selfComplete($config);
        }
    }

    private function selfComplete(Qrxq2017Enroll $src){
        if (!isset($src) || empty($src)) {
            throw new Exception("Qrxq2017Enroll model source obj not set");
        }

        $this->setGender($src->gender);
        $this->setApplicant_role($src->applicant_role);
        $this->setHighest_degree($src->highest_degree);
        $this->setCreated_at($src->created_at);
        $this->setModified_at($src->modified_at);
        $this->setAge(JdhnCommonHelper::getAgeByBirthYear($this->birth_year));
    }

}