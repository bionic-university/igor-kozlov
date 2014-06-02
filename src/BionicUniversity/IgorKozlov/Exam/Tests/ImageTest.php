<?php
namespace BionicUniversity\IgorKozlov\Exam\Tests;

use BionicUniversity\IgorKozlov\Exam\Code\Image;
use BionicUniversity\IgorKozlov\Exam\Code\Point;

/**
 * Class ImageTest
 * 
 * @package BionicUniversity\IgorKozlov\Exam\Tests
 */
class ImageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test getting Height
     */
    public function testGetHeight()
    {
        $image = new Image(2, 2);
        $this->assertEquals(2, $image->getHeight());
    }

    /**
     * Test setting Height
     */
    public function testSetHeight()
    {
        $image = new Image(2, 2);
        $newHeight = 1.2;
        $image->setHeight($newHeight);
        $this->assertEquals($newHeight, $image->getHeight());
    }

    /**
     * Test getting Width
     */
    public function testGetWidth()
    {
        $image = new Image(2, 2);
        $this->assertEquals(2, $image->getWidth());
    }

    /**
     * Test setting Width
     */
    public function testSetWidth()
    {
        $image = new Image(2, 2);
        $newWidth = 1.2;
        $image->setWidth($newWidth);
        $this->assertEquals($newWidth, $image->getWidth());
    }

    /**
     * Test getting centre
     */
    public function testGetCentre()
    {
        $image = new Image(4, 4);
        $centrePoint = new Point(2, 2);
        $myReflection = new \ReflectionClass($image);
        $reflection_method = $myReflection->getMethod("getCentre");
        $reflection_method->setAccessible(true);
        $result = $reflection_method->invoke($image, NULL);
        $this->assertEquals($centrePoint, $result);
    }

    /**
     * Test crop
     */
    public function testCrop()
    {
        $image = new Image(4, 4);
        $imageExepted = new Image(2, 2);
        $imageActual = $image->crop(0);
        $this->assertEquals($imageExepted, $imageActual);
    }

    /**
     * Test crop
     */
    public function testResize()
    {
        $image = new Image(4, 4);
        $imageExepted = new Image(2, 2);
        $imageActual = $image->resize(2);
        $this->assertEquals($imageExepted, $imageActual);
    }

}
 