<?php

class dwellingHouse extends House
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
     * @param $numberOfOccupants
     * @param $roomCount
     */
    function __construct($numberOfOccupants, $roomCount)
    {
        $this->numberOfOccupants = $numberOfOccupants;
        $this->roomCount = $roomCount;
    }

    /**
     * @return mixed
     */
    public function getNumberOfOccupants()
    {
        return $this->numberOfOccupants;
    }

    /**
     * @param mixed $numberOfOccupants
     */
    public function setNumberOfOccupants($numberOfOccupants)
    {
        $this->numberOfOccupants = $numberOfOccupants;
    }

    /**
     * @return mixed
     */
    public function getRoomCount()
    {
        return $this->roomCount;
    }

    /**
     * @param mixed $roomCount
     */
    public function setRoomCount($roomCount)
    {
        $this->roomCount = $roomCount;
    }

    public function makeSomething()
    {
        return  "Accommodating people..." . PHP_EOL;
    }
}