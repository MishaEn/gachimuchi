<?php
namespace Misha\Gachimuchi;
use DateTime;

/**
 * Class Request описание запроса с системе
 */
class Request {
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
    private $beginDate;
    /**
     * @var DateTime
     */
    private $endDate;

    /**
     * Request constructor.
     *
     * @param Master   $master
     * @param Slave    $slave
     * @param DateTime $beginDate
     * @param DateTime $endDate
     */
    public function __construct(Master $master, Slave $slave, DateTime $beginDate, DateTime $endDate)
    {
        $this->master = $master;
        $this->slave = $slave;
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
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
     * @return DateTime
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}