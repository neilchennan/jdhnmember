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

class ActionResult extends Object
{
    /**
     * @var boolean
     */
    protected $isSuccess;

    /**
     * @return boolean
     */
    public function isIsSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * @param boolean $isSuccess
     */
    public function setIsSuccess($isSuccess)
    {
        $this->isSuccess = $isSuccess;
    }
    /**
     * @var string;
     */
    protected $message;

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->total_count;
    }

    /**
     * @param int $total_count
     */
    public function setTotalCount($total_count)
    {
        $this->total_count = $total_count;
    }

    /**
     * @return int
     */
    public function getSuccessCount()
    {
        return $this->success_count;
    }

    /**
     * @param int $success_count
     */
    public function setSuccessCount($success_count)
    {
        $this->success_count = $success_count;
    }

    /**
     * @return int
     */
    public function getFailCount()
    {
        return $this->fail_count;
    }

    /**
     * @param int $fail_count
     */
    public function setFailCount($fail_count)
    {
        $this->fail_count = $fail_count;
    }
    /**
     * @var \yii\base\Exception
     */
    protected $exception;
    /**
     * @var array
     */
    protected $sub_results;

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return \yii\base\Exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @param \yii\base\Exception $exception
     */
    public function setException($exception)
    {
        $this->exception = $exception;
    }

    /**
     * @var int
     */
    protected $total_count;
    /**
     * @var int
     */
    protected $success_count;
    /**
     * @var int
     */
    protected $fail_count;

    /**
     * @return array
     */
    public function getSubResults()
    {
        return $this->sub_results;
    }

    /**
     * @param array $sub_results
     */
    public function setSubResults($sub_results)
    {
        $this->sub_results = $sub_results;
    }

    /**
     * @param ActionResult $sub_result
     */
    public function addSubResult(ActionResult $sub_result){
        if (!isset($this->sub_results) || sizeof($this->sub_results) == 0){
            $this->sub_results = array();
        }
        if (!isset($sub_result)) return;
        array_push($this->sub_results, $sub_result);

        $this->total_count ++;

        if($this->isSuccess){
            $this->isSuccess = $this->isSuccess && $sub_result->isSuccess;
        }

        if ($sub_result->isSuccess){
            $this->success_count ++;
        }
        else {
            $this->fail_count ++;
        }

        $this->selfComplete();
    }

    public function __construct($isSuccess = true, $message = '', $exception = null)
    {
        parent::__construct();
        $this->setIsSuccess($isSuccess);
        $this->setMessage($message);
        $this->setException($exception);

        $this->selfComplete();
    }

    protected function selfComplete(){
        if (!isset($this->sub_results) || sizeof($this->sub_results) == 0){
            $this->total_count = 1;
            $this->success_count = $this->isSuccess ? 1 : 0;
            $this->fail_count = $this->total_count - $this->success_count;
        }
        else {
            $this->message = Yii::t('app', 'TotalCount : {total_count} , Success : {success_count} , Fail : {fail_count} .', [
                'total_count' => $this->total_count,
                'success_count' => $this->success_count,
                'fail_count' => $this->fail_count,
            ]);
        }
    }
}