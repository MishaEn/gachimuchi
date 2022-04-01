<?php
namespace Misha\Gachimuchi\repository;
use Misha\Gachimuchi\Master;

/**
 * Interface MasterRepository
 */
interface MasterRepository {
    /**
     * @param Master $master
     *
     * @return void
     */
    public function save(Master $master);

    /**
     * @return array
     */
    public function getAll();
}