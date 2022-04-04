<?php


namespace Misha\Gachimuchi\repository;


/**
 * Interface Repository
 * @package Misha\Gachimuchi\repository
 */
interface Repository
{
    /**
     * @param $object
     * @return mixed
     */
    public function save($object);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @param $id
     * @return object
     */
    public function getById($id);
}