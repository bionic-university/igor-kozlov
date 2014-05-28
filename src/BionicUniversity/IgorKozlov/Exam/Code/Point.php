<?php

namespace BionicUniversity\IgorKozlov\Exam\Code;

/**
 * Class Point
 * @package BionicUniversity\IgorKozlov\Exam\Code
 */

class Point
{
    /**
     * @var float
     */
    private $xCoord;
    /**
     * @var float
     */
    private $yCoord;

    /**
     * @param float $xCoord
     * @param float $yCoord
     */
    public function __construct($xCoord, $yCoord)
    {
        $this->xCoord = $xCoord;
        $this->yCoord = $yCoord;
    }

    /**
     * @return float
     */
    public function getXCoord()
    {
        return $this->xCoord;
    }

    /**
     * @param float $xCoord
     */
    public function setXCoord($xCoord)
    {
        $this->xCoord = $xCoord;
    }

    /**
     * @return float
     */
    public function getYCoord()
    {
        return $this->yCoord;
    }

    /**
     * @param float $yCoord
     */
    public function setYCoord($yCoord)
    {
        $this->yCoord = $yCoord;
    }

}
