<?php
namespace BionicUniversity\IgorKozlov\HouseOop\Code;

/**
 * Class dwellingHouse
 *
 * @package BionicUniversity\IgorKozlov\HouseOop\Code
 */
class DwellingHouse extends House
{
    /**
     * @var int
     */
    protected $numberOfOccupants;
    /**
     * @var int
     */
    protected $roomCount;

    /**
     * @param int $numberOfOccupants
     * @param int $roomCount
     */
    public function __construct($numberOfOccupants, $roomCount)
    {
        $this->numberOfOccupants = $numberOfOccupants;
        $this->roomCount = $roomCount;
    }

    /**
     * @return int
     */
    public function getNumberOfOccupants()
    {
        return $this->numberOfOccupants;
    }

    /**
     * @param int $numberOfOccupants
     */
    public function setNumberOfOccupants($numberOfOccupants)
    {
        $this->numberOfOccupants = $numberOfOccupants;
    }

    /**
     * @return int
     */
    public function getRoomCount()
    {
        return $this->roomCount;
    }

    /**
     * @param int $roomCount
     */
    public function setRoomCount($roomCount)
    {
        $this->roomCount = $roomCount;
    }

    /**
     * @return string
     */
    public function makeSomething()
    {
        return "Accommodating people..." . PHP_EOL;
    }
}
