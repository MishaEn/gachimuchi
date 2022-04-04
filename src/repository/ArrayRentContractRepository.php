<?php
namespace Misha\Gachimuchi\repository;
use Misha\Gachimuchi\RentContract;

/**
 * Class ArrayRentContractRepository
 */
class ArrayRentContractRepository implements Repository
{
    /**
     * @var array
     */
    private $rentContracts = [];

    /**
     * @param RentContract $rentContract
     */
    public function save($rentContract)
    {
        $this->rentContracts[(string)$rentContract->getId()] = $rentContract;
    }

    /**
     * @return array
     */
    public function getAll() {
        return $this->rentContracts;
    }

    /**
     * @param $id
     * @return false|mixed|object
     */
    public function getById($id)
    {
        if (isset($this->rentContracts[$id])) {
            return $this->rentContracts[$id];
        }

        return false;
    }

    /**
     * @param $id
     * @return array
     */
    public function getListById($id)
    {
        $rentContractList = [];
        foreach ($this->rentContracts as $rentContract)
        {
            if ($id === $rentContract->getSlave()->getId())
            {
                array_push($rentContractList, $rentContract);
            }
        }

        return $rentContractList;
    }
}