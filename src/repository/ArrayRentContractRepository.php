<?php
namespace Misha\Gachimuchi\repository;
use Misha\Gachimuchi\RentContract;

/**
 * Class ArrayRentContractRepository
 */
class ArrayRentContractRepository implements RentContractRepository
{
    /**
     * @var array
     */
    private $rentContracts = [];

    /**
     * @param RentContract $rentContract
     */
    public function save(RentContract $rentContract)
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
     *
     * @return array
     */
    public function getListBySlaveId($id) {
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