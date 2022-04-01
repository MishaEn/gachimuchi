<?php
namespace Misha\Gachimuchi\repository;
use Misha\Gachimuchi\RentContract;

/**
 * Interface RentContractRepository
 */
interface RentContractRepository {
    /**
     * @param RentContract $rentContract
     *
     * @return void
     */
    public function save(RentContract $rentContract);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @param $id
     *
     * @return array
     */
    public function getListBySlaveId($id);
}