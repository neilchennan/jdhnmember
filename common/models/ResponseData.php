<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/16
 * Time: 22:09
 */

namespace common\models;


use yii\base\Object;

class ResponseData extends Object
{
    /**
     * @var string
     */
    protected $_message;
    /**
     * @var string
     */
    protected $_code;
    /**
     * @var array
     */
    protected $_data;

    /**
     * @var \Exception
     */
    protected $_exception;

    /**
     * @return \Exception
     */
    public function getException()
    {
        return $this->_exception;
    }

    /**
     * @param \Exception $exception
     */
    public function setException($exception)
    {
        $this->_exception = $exception;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        if(!isset($this->_message)){
            $this->_message = StatusCodeEnum::MSG_BY_STATUS_CODE($this->getCode());
        }
        return $this->_message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->_message = $message;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->_code = $code;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->_data = $data;
    }

    public function __construct($code = StatusCodeEnum::SUCCESS, $data = [], $message = null, \Exception $exception = null){
        $this->setCode($code);
        $this->setData($data);
        $this->setMessage($message);
        $this->setException($exception);
    }

    public function getResultArray(){
        return [
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
            'data' => $this->getData(),
        ];
    }
}