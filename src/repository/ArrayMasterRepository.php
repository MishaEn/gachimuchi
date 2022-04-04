<?php
namespace Misha\Gachimuchi\repository;
use Misha\Gachimuchi\Master;

/**
 * Class ArrayMasterRepository
 */
class ArrayMasterRepository implements Repository
{
    /**
     * @var array
     */
    private $masters = [];

    /**
     * @param Master $master
     */
    public function save($master)
    {
        $this->masters[(string)$master->getId()] = $master;
    }

    /**
     * @return array
     */
    public function getAll() {
        return $this->masters;
    }

    /**
     * @param $id
     * @return false|mixed|object
     */
    public function getById($id)
    {
        if (isset($this->masters[$id])) {
            return $this->masters[$id];
        }

        return false;
    }
}