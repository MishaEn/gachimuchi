<?php
namespace Misha\Gachimuchi;
use DateTime;
use Misha\Gachimuchi\repository\RentContractRepository;

/**
 * Class RentContract описание договора аренды
 */
class RentContract {
    /**
     * @var int
     */
    private $id;
    /**
     * @var Master
     */
    private $master;
    /**
     * @var Slave
     */
    private $slave;
    /**
     * @var DateTime
     */
    private $begDate;
    /**
     * @var DateTime
     */
    private $endDate;
    /**
     * @var float
     */
    private $price;

    /**
     * RentContract constructor.
     *
     * @param          $id
     * @param Master   $master
     * @param Slave    $slave
     * @param DateTime $begDate
     * @param DateTime $endDate
     * @param float    $price
     */
    public function __construct($id, Master $master, Slave $slave, DateTime $begDate, DateTime $endDate, $price)
    {
        $this->id = $id;
        $this->master = $master;
        $this->slave = $slave;
        $this->begDate = $begDate;
        $this->endDate = $endDate;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getBegDate()
    {
        return $this->begDate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
    /**
     * @return Master
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * @return Slave
     */
    public function getSlave()
    {
        return $this->slave;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param RentContractRepository $rentContractRepository
     */
    public function save(RentContractRepository $rentContractRepository)
    {
        $rentContractRepository->save($this);
    }
}