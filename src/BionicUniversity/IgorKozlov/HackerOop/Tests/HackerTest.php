<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Tests;

use BionicUniversity\IgorKozlov\HackerOop\Code\Hacker;

class HackerTest extends \PHPUnit_Framework_TestCase
{
    public function testSetFullname()
    {
        $hacker = new Hacker();
        $fullname = 'Igor Kozlov';
        $hacker->setFullname($fullname);
        $this->assertEquals($fullname, $hacker->getFullname());
    }

    public function testSetToolsToScan()
    {
        $hacker = new Hacker();
        $toolsToScan = array(
            'arachni', 'ARMITAGE'
        );
        $hacker->setToolsToScan($toolsToScan);
        $this->assertEquals($toolsToScan, $hacker->getToolsToScan());
    }

}
