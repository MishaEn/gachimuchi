<?php
namespace Misha\Gachimuchi;
use Misha\Gachimuchi\repository\MasterRepository;

/**
 * Class Master описывает хозяина
 */
class Master {
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var boolean
     */
    private $isVip;

    /**
     * repository constructor.
     *
     * @param int    $id
     * @param string $name
     * @param bool   $isVip
     */
    public function __construct($id, $name, $isVip)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isVip = $isVip;
    }

    /**
     * @param MasterRepository $masterRepository
     */
    public function save(MasterRepository $masterRepository)
    {
        $masterRepository->save($this);
    }

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
     * @return bool
     */
    public function isVip()
    {
        return $this->isVip;
    }
}