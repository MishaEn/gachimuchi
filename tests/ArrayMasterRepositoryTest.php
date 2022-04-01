<?php

namespace repository;

use Misha\Gachimuchi\Master;
use Misha\Gachimuchi\repository\ArrayMasterRepository;
use PHPUnit\Framework\TestCase;

class ArrayMasterRepositoryTest extends TestCase
{
    public function test_Save_success(){
        $masterRepository = new ArrayMasterRepository();

        $master1 = new Master(1, 'master 1', false);
        $masterRepository->save($master1);

        $this->assertNotEmpty($masterRepository->getAll());
        $this->assertInstanceOf(Master::class, $masterRepository->getAll()[1]);
    }
}
