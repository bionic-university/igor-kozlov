<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Tests;

use BionicUniversity\IgorKozlov\HackerOop\Code\Hacker;

/**
 * Class HackerTest
 * @package BionicUniversity\IgorKozlov\HackerOop\Tests
 */
class HackerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test setting fullname
     */
    public function testSetFullname()
    {
        $hacker = new Hacker();
        $fullname = 'Igor Kozlov';
        $hacker->setFullname($fullname);
        $this->assertEquals($fullname, $hacker->getFullname());
    }

    /**
     * Test getting fullname
     */
    public function testGetFullname()
    {
        $hacker = new Hacker('Igor Kozlov');
        $this->assertEquals('Igor Kozlov', $hacker->getFullname());
    }

    /**
     * Test setting nickname
     */
    public function testSetNickname()
    {
        $hacker = new Hacker();
        $nickname = 'Varrek';
        $hacker->setNickname($nickname);
        $this->assertEquals($nickname, $hacker->getNickname());
    }

    /**
     * Test setting toolsToScan
     */
    public function testSetToolsToScan()
    {
        $hacker = new Hacker();
        $toolsToScan = array(
            'arachni', 'ARMITAGE'
        );
        $hacker->setToolsToScan($toolsToScan);
        $this->assertEquals($toolsToScan, $hacker->getToolsToScan());
    }

    /**
     * Test setting proficiency
     */
    public function testSetProficiency()
    {
        $hacker = new Hacker();
        $proficiency = rand(0, 2);
        $hacker->setProficiency($proficiency);
        $this->assertEquals($proficiency, $hacker->getProficiency());
    }

    /**
     * Test setting toolsToSelfProtect
     */
    public function testSetToolsToSelfProtect()
    {
        $hacker = new Hacker();
        $toolsToSelfProtect = array(
            'arachni', 'ARMITAGE', "NODE32"
        );
        $hacker->setToolsToSelfProtect($toolsToSelfProtect);
        $this->assertEquals($toolsToSelfProtect, $hacker->getToolsToSelfProtect());
    }

    /**
     * Test hacking with wrong classname
     */
    public function testHackWrongName()
    {
        $hacker = new Hacker();
        $string = "AFGD";
        $expectedResult = "Wrong class name!!!" . PHP_EOL;
        $this->assertEquals($expectedResult, $hacker->hack($string));
    }

    /**
     * Test hacking with wrong classname
     */
    public function testHackCantHack()
    {
        $hacker = new Hacker();
        $string = "Emails";
        $expectedResult = "You cant hack this!!!" . PHP_EOL;
        $this->assertEquals($expectedResult, $hacker->hack($string));
    }
}
