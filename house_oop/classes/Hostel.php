<?php

class Hostel extends dwellingHouse {
    /**
     * @var float
     */
    protected $fee;
    /**
     * @var int
     */
    protected $roommatesCount;

    /**
     * @param $fee
     * @param $roommatesCount
     */
    function __construct($fee, $roommatesCount)
    {
        $this->fee = $fee;
        $this->roommatesCount = $roommatesCount;
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param mixed $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    /**
     * @return mixed
     */
    public function getRoommatesCount()
    {
        return $this->roommatesCount;
    }

    /**
     * @param mixed $roommatesCount
     */
    public function setRoommatesCount($roommatesCount)
    {
        $this->roommatesCount = $roommatesCount;
    }


    public function makeSomething()
    {
       return "Reservation...".PHP_EOL;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->getFee()*$this->getRoommatesCount();
    }


} 