<?php

namespace BionicUniversity\IgorKozlov\Exam\Code;

/**
 * Class Point
 * @package BionicUniversity\IgorKozlov\Exam\Code
 */
class Point
{
    /**
     * @var
     */
    private $xCoord;
    /**
     * @var
     */
    private $yCoord;

    /**
     * @param $xCoord
     * @param $yCoord
     */
    public function __construct($xCoord, $yCoord)
    {
        $this->xCoord = $xCoord;
        $this->yCoord = $yCoord;
    }

    /**
     * @return mixed
     */
    public function getXCoord()
    {
        return $this->xCoord;
    }

    /**
     * @param mixed $xCoord
     */
    public function setXCoord($xCoord)
    {
        $this->xCoord = $xCoord;
    }

    /**
     * @return mixed
     */
    public function getYCoord()
    {
        return $this->yCoord;
    }

    /**
     * @param mixed $yCoord
     */
    public function setYCoord($yCoord)
    {
        $this->yCoord = $yCoord;
    }

}
