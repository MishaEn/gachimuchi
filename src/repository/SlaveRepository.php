<?php
namespace Misha\Gachimuchi\repository;
use Misha\Gachimuchi\Slave;

/**
 * Interface SlaveRepository
 */
interface SlaveRepository {
    /**
     * @param Slave $slave
     *
     * @return void
     */
    public function save(Slave $slave);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @param $id
     *
     * @return int
     */
    public function getById($id);
}