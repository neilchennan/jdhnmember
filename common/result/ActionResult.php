<?php

/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/7
 * Time: 21:04
 */
namespace common\result;

use Yii;
use yii\base\Object;

/**
 * @property \Exception $exception 异常
 * @property array $sub_results 子结果集合
 * @property boolean $isSuccess 是否成功
 * @property string $message 消息
 * @property int $total_count 总记录数
 * @property int $success_count 成功记录数
 * @property int $fail_count 失败记录数
 * @property array $sub_success_results 成功的子结果集合
 * @property array $sub_fail_results 失败的子结果集合
 */
class ActionResult extends Object
{
    /**
     * @var boolean
     */
    public $isSuccess;

    /**
     * @var string
     */
    public $message;

    /**
     * @var \Exception
     */
    public $exception;

    /**
     * @var int
     */
    public $total_count;

    /**
     * @var int
     */
    public $success_count;

    /**
     * @var array
     */
    public $sub_results;
    /**
     * @var array
     */
    public $sub_success_results;
    /**
     * @var array
     */
    public $sub_fail_results;

    /**
     * @var int
     */
    public $fail_count;


    /**
     * @param ActionResult $sub_result
     */
    public function addSubResult(ActionResult $sub_result){
        if (!isset($this->sub_results) || sizeof($this->sub_results) == 0){
            $this->sub_results = array();
        }
        if (!isset($this->sub_success_results) || sizeof($this->sub_success_results) == 0){
            $this->sub_success_results = array();
        }
        if (!isset($this->sub_fail_results) || sizeof($this->sub_fail_results) == 0){
            $this->sub_fail_results = array();
        }

        if (!isset($sub_result)) return;
        array_push($this->sub_results, $sub_result);

        if ($sub_result->isSuccess){
            array_push($this->sub_success_results, $sub_result);
        }
        if (!$sub_result->isSuccess){
            array_push($this->sub_fail_results, $sub_result);
        }

        if($this->isSuccess){
            $this->isSuccess = $this->isSuccess && $sub_result->isSuccess;
        }

        $this->selfComplete();
    }

    public function __construct($isSuccess = true, $message = '', \Exception $exception = null)
    {
        parent::__construct();
        $this->isSuccess = $isSuccess;
        if (empty($message)){
            $this->message = Yii::t('app', 'No any action executed.');
        }
        else {
            $this->message = $message;
        }

        $this->exception = $exception;

        $this->selfComplete();
    }

    protected function selfComplete(){
        if (!isset($this->sub_results) || sizeof($this->sub_results) == 0){
            $this->total_count = 1;
            $this->success_count = $this->isSuccess ? 1 : 0;
            $this->fail_count = $this->total_count - $this->success_count;
        }
        else {
            $this->total_count = count($this->sub_results);
            $this->success_count = count($this->sub_success_results);
            $this->fail_count = count($this->sub_fail_results);

            $this->message = Yii::t('app', 'TotalCount : {total_count} , Success : {success_count} , Fail : {fail_count} .', [
                'total_count' => $this->total_count,
                'success_count' => $this->success_count,
                'fail_count' => $this->fail_count,
            ]);
        }
    }
}