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
    private $x;
    /**
     * @var
     */
    private $y;

    /**
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

}
