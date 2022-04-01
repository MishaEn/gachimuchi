<?php
namespace Misha\Gachimuchi\repository;
use Misha\Gachimuchi\Slave;

/**
 * Class ArraySlaveRepository
 */
class ArraySlaveRepository implements SlaveRepository
{
    /**
     * @var array
     */
    private $slaves = [];

    /**
     * @param Slave $slave
     */
    public function save(Slave $slave)
    {
        $this->slaves[(string)$slave->getId()] = $slave;
    }

    /**
     * @return array
     */
    public function getAll() {
        return $this->slaves;
    }

    /**
     * @param $id
     *
     * @return int|mixed
     */
    public function getById($id)
    {
        if (isset($this->slaves[(string)$id])) {
            return $this->slaves[(string)$id];
        }

        return false;
    }
}