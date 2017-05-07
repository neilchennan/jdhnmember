<?php

/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/7
 * Time: 21:04
 */
namespace common\result;

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
    }

    public function __construct($isSuccess, $message = '', $exception = null)
    {
        parent::__construct();
        $this->setIsSuccess($isSuccess);
        $this->setMessage($message);
        $this->setException($exception);
    }
}