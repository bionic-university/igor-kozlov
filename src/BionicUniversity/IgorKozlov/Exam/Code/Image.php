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
 *
 * @package BionicUniversity\IgorKozlov\Exam\Code
 */
class Image extends AbstractResizer implements ImageInterface
{
    /**
     * @var float
     */
    private $height;
    /**
     * @var float
     */
    private $width;
    /**
     * @var float
     */
    private $imageFirstCoord;

    /**
     * @param float $height
     * @param float $width
     */
    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->imageFirstCoord = new Point(0, 0);
        $this->width = $width;
    }

    /**
     * Thumb =Crop and Resize
     * @param $mode
     * @param $n
     * @param $distanceFromCentre
     *
     * @return mixed
     */
    public function thumbnail($mode = "", $dimension = 2, $distanceFromCentre = 20)
    {
        if ('resize' == $mode) {
            $thumbnail = $this->resize($dimension);
        } elseif ('crop' == $mode) {
            $thumbnail = $this->crop($distanceFromCentre);
        } else {
            $thumbnail = $this->resize($dimension)->crop($distanceFromCentre);
        }

        return $thumbnail;
    }

    /**
     * @param $dimension
     *
     * @return Image
     */
    public function resize($dimension)
    {
        $newHeight = $this->getHeight() / $dimension;
        $newWidth = $this->getWidth() / $dimension;
        $imageResized = new Image($newHeight, $newWidth);

        return $imageResized;
    }

    /**
     * @param $distanceFromCentre
     *
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
    public function getImageFirstCoord()
    {
        return $this->imageFirstCoord;
    }

    /**
     * @param float $imageCentre
     */
    public function setImageFirstCoord($imageCentre)
    {
        $this->imageFirstCoord = $imageCentre;
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
     * @return Point
     */
    protected function getCentre()
    {
        $centre = new Point($this->getWidth() / 2, $this->getHeight() / 2);

        return $centre;
    }

}
