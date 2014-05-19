<?php
/**
 * Created by PhpStorm.
 * User: bionic
 * Date: 5/14/14
 * Time: 8:54 PM
 */

namespace BionicUniversity\IgorKozlov\Exam\Code;


/**
 * Class Image
 * @package BionicUniversity\IgorKozlov\Exam\Code
 */
class Image extends AbstractResizer implements ImageInterface
{
    /**
     * @var
     */
    private $height;
    /**
     * @var
     */
    private $width;
    /**
     * @var
     */
    private $imageFirstCoord;

    /**
     * @param $height
     * @param Point $imageCentre
     * @param $width
     */
    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->imageFirstCoord = new Point(0, 0);
        $this->width = $width;
    }

    /**
     * Thumb =Crop and Resize
     * @return mixed
     */
    public function thumbnail($mode = "", $n = 2, $distanceFromCentre = 20)
    {
        if ('resize' == $mode) {
            $thumbnail = $this->resize($n);
        } else if ('crop' == $mode) {
            $thumbnail = $this->crop($distanceFromCentre);
        } else {
            $thumbnail = $this->resize($n)->crop($distanceFromCentre);
        }
        return $thumbnail;
    }

    /**
     * @param $n
     * @return Image
     */
    public function resize($n)
    {
        $newHeight = $this->getHeight() / $n;
        $newWidth = $this->getWidth() / $n;
        $imageResized = new Image($newHeight, $newWidth);
        return $imageResized;
    }

    /**
     * @param $distanceFromCentre
     * @return Image
     */
    public function crop($distanceFromCentre)
    {
        $newHeight = $this->getCentre($this->getWidth(), $this->getHeight()) + $distanceFromCentre;
        $newWidth = $this->getCentre($this->getWidth(), $this->getHeight()) + $distanceFromCentre;
        $imageCropped = new Image($newHeight, $newWidth);
        return $imageCropped;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getImageFirstCoord()
    {
        return $this->imageFirstCoord;
    }

    /**
     * @param mixed $imageCentre
     */
    public function setImageFirstCoord($imageCentre)
    {
        $this->imageFirstCoord = $imageCentre;
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
     * @param $width
     * @param $height
     * @return Point
     */
    protected function getCentre()
    {
        $centre = new Point($this->getWidth() / 2, $this->getHeight() / 2);
        return $centre;
    }

} 