<?php

abstract class House
{
    /*
     * @var float
     */
    protected $width;

    /**
     * @var float
     */
    protected $height;

    /**
     * @param $height
     * @param $width
     */
    function __construct($height, $width)
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
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public  function getSquare()
    {
        return $this->getHeight() * $this->getWidth();
    }

    abstract public function makeSomething();
} 