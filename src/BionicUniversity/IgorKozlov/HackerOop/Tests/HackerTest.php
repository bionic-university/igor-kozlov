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

    public function testGetFullname()
    {
        $hacker = new Hacker('Igor Kozlov');
        $this->assertEquals('Igor Kozlov', $hacker->getFullname());
    }

    public function testSetNickname()
    {
        $hacker = new Hacker();
        $nickname = 'Varrek';
        $hacker->setNickname($nickname);
        $this->assertEquals($nickname, $hacker->getNickname());
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

    public function testSetProficiency() {
        $hacker = new Hacker();
        $proficiency=rand(0,2);
        $hacker->setProficiency($proficiency);
        $this->assertEquals($proficiency, $hacker->getProficiency());
    }

    public function testSetToolsToSelfProtect()
    {
        $hacker = new Hacker();
        $toolsToSelfProtect = array(
            'arachni', 'ARMITAGE',"NODE32"
        );
        $hacker->setToolsToSelfProtect($toolsToSelfProtect);
        $this->assertEquals($toolsToSelfProtect, $hacker->getToolsToSelfProtect());
    }
}
