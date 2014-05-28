<?php
namespace BionicUniversity\IgorKozlov\HouseOop\Code;

/**
 * Class House
 * @package BionicUniversity\IgorKozlov\HouseOop\Code
 */

abstract class House
{
    /**
     * @var float
     */
    protected $width;

    /**
     * @var float
     */
    protected $height;

    /**
     * @param float $height
     * @param float $width
     */
    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getSquare()
    {
        return $this->getHeight() * $this->getWidth();
    }

    /**
     * @return mixed
     */
    abstract public function makeSomething();
}
