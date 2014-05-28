<?php
/**
 * Created by PhpStorm.
 * User: varrek
 * Date: 28.05.14
 * Time: 23:59
 */
namespace BionicUniversity\IgorKozlov\HouseOop\Tests;

use BionicUniversity\IgorKozlov\HouseOop\Code\Hostel;

/**
 * Class HostelTest
 * @package BionicUniversity\IgorKozlov\HouseOop\Tests
 */

class HostelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test fee
     */
    public function testSetFee()
    {
        $hostel = new Hostel(7.3, 2);
        $newFee = 10;
        $hostel->setFee($newFee);
        $this->assertEquals($newFee, $hostel->getFee());
    }

    /**
     * Test RoommatesCount
     */
    public function testSetRoommatesCount()
    {
        $hostel = new Hostel(7.3, 2);
        $newRoommates = 10;
        $hostel->setRoommatesCount($newRoommates);
        $this->assertEquals($newRoommates, $hostel->getRoommatesCount());
    }
}
 