<?php
namespace Misha\Gachimuchi\repository;
use Misha\Gachimuchi\Master;

/**
 * Class ArrayMasterRepository
 */
class ArrayMasterRepository implements MasterRepository {
    /**
     * @var array
     */
    private $masters = [];

    /**
     * @param Master $master
     */
    public function save(Master $master)
    {
        $this->masters[(string)$master->getId()] = $master;
    }

    /**
     * @return array
     */
    public function getAll() {
        return $this->masters;
    }
}