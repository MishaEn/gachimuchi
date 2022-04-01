<?php
namespace Misha\Gachimuchi;
use Misha\Gachimuchi\repository\SlaveRepository;

/**
 * Class Slave описание раба
 */
class Slave {
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPricePerHour()
    {
        return $this->pricePerHour;
    }
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $pricePerHour;

    /**
     * Slave constructor.
     *
     * @param int    $id
     * @param string $name
     * @param float  $pricePerHour
     */
    public function __construct($id, $name, $pricePerHour)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pricePerHour = $pricePerHour;
    }

    /**
     * @param SlaveRepository $slaveRepository
     */
    public function save(SlaveRepository $slaveRepository){
        $slaveRepository->save($this);
    }
}