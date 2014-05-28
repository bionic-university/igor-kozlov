<?php
namespace BionicUniversity\IgorKozlov\HouseOop\Code;

/**
 * Class Hostel
 * @package BionicUniversity\IgorKozlov\HouseOop\Code
 */
class Hostel extends DwellingHouse
{
    /**
     * @var float
     */
    protected $fee;
    /**
     * @var int
     */
    protected $roommatesCount;

    /**
     * @param float $fee
     * @param int   $roommatesCount
     */
    public function __construct($fee, $roommatesCount)
    {
        $this->fee = $fee;
        $this->roommatesCount = $roommatesCount;
    }

    /**
     * @return float
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param float $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    /**
     * @return int
     */
    public function getRoommatesCount()
    {
        return $this->roommatesCount;
    }

    /**
     * @param int $roommatesCount
     */
    public function setRoommatesCount($roommatesCount)
    {
        $this->roommatesCount = $roommatesCount;
    }

    /**
     * @return string
     */
    public function makeSomething()
    {
        return "Reservation..." . PHP_EOL;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->getFee() * $this->getRoommatesCount();
    }

}
