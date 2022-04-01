<?php

use Misha\Gachimuchi\Master;
use Misha\Gachimuchi\RentContract;
use Misha\Gachimuchi\RentProcess;
use Misha\Gachimuchi\repository\ArrayMasterRepository;
use Misha\Gachimuchi\repository\ArrayRentContractRepository;
use Misha\Gachimuchi\repository\ArraySlaveRepository;
use Misha\Gachimuchi\Request;
use Misha\Gachimuchi\Slave;
use PHPUnit\Framework\TestCase;

class RentProcessTest extends TestCase
{

    public function test_RentProcess_fail()
    {
        $masterRepository = new ArrayMasterRepository();
        $slaveRepository = new ArraySlaveRepository();
        $rentContractRepository = new ArrayRentContractRepository();

        $master1 = new Master(1, 'master 1', false);
        $master2 = new Master(2, 'master 2', false);
        $master3 = new Master(3, 'master 3', true);
        $masterRepository->save($master1);
        $masterRepository->save($master2);
        $masterRepository->save($master3);

        $slave = new Slave(1, 'slave 1', 1.00);
        $slaveRepository->save($slave);

        $rentContract1 = new RentContract(1, $master1, $slave, new DateTime('2022-01-01 00:00:00'), new DateTime('2022-01-07 23:59:00'), '1.1');
        $rentContract2 = new RentContract(2, $master3, $slave, new DateTime('2022-01-02 00:00:00'), new DateTime('2022-01-09 23:59:00'), '1.1');
        $rentContractRepository->save($rentContract1);
        $rentContractRepository->save($rentContract2);

        $request = new Request($master2, $slave, new DateTime('2022-01-01 23:00:00'), new DateTime('2022-01-13 02:30:00'));

        $rentProcess = new RentProcess($masterRepository, $slaveRepository, $rentContractRepository);
        $response = $rentProcess->process($request);

        $expectedErrors = [
            'Невозможно выполнить запрос. Раб №1 slave 1 занят. Пересечение периодов аренды с контрактом №1, Дата начала контракта: 01.01.2022 00:00, Дата окончания контракта: 07.01.2022 23:59',
            'Невозможно выполнить запрос. Раб №1 slave 1 занят. Пересечение периодов аренды с контрактом №2, Дата начала контракта: 02.01.2022 00:00, Дата окончания контракта: 09.01.2022 23:59'
        ];
        $this->assertEquals($expectedErrors, $response->getErrors());
        $this->assertEquals('error', $response->getStatus());
        $this->assertNull($response->getRentContract());
    }

    public function test_RentProcess_success()
    {
        $masterRepository = new ArrayMasterRepository();
        $slaveRepository = new ArraySlaveRepository();
        $rentContractRepository = new ArrayRentContractRepository();

        $master1 = new Master(1, 'master 1', false);
        $master2 = new Master(2, 'master 2', false);
        $master3 = new Master(3, 'master 3', true);
        $masterRepository->save($master1);
        $masterRepository->save($master2);
        $masterRepository->save($master3);

        $slave = new Slave(1, 'slave 1', 1.00);
        $slaveRepository->save($slave);

        $rentContract1 = new RentContract(1, $master1, $slave, new DateTime('2022-01-01 00:00:00'), new DateTime('2022-01-07 23:59:00'), '1.1');
        $rentContract2 = new RentContract(2, $master3, $slave, new DateTime('2022-01-02 00:00:00'), new DateTime('2022-01-09 23:59:00'), '1.1');
        $rentContractRepository->save($rentContract1);
        $rentContractRepository->save($rentContract2);

        $request = new Request($master2, $slave, new DateTime('2022-01-20 23:00:00'), new DateTime('2022-01-29 02:30:00'));

        $rentProcess = new RentProcess($masterRepository, $slaveRepository, $rentContractRepository);
        $response = $rentProcess->process($request);

        $this->assertEmpty($response->getErrors());
        $this->assertEquals('success', $response->getStatus());
        $this->assertInstanceOf(RentContract::class, $response->getRentContract());
    }
}
