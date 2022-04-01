<?php
namespace Misha\Gachimuchi;
/**
 * Class Response
 */
class Response
{

    /**
     * @var string
     */
    private $status;
    /**
     * @var array
     */
    private $errors = [];
    /**
     * @var RentContract
     */
    private $rentContract;

    /**
     * @param $error
     */
    public function addError($error)
    {
        $this->status = 'error';
        $this->errors[] = $error;
    }
    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    /**
     * @param RentContract $rentContract
     */
    public function setRentContract($rentContract)
    {
        $this->rentContract = $rentContract;
    }
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return RentContract
     */
    public function getRentContract()
    {
        return $this->rentContract;
    }
}