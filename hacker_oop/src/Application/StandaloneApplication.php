<?php


namespace Application;


class StandaloneApplication extends AbstractApplication implements HackableInterface
{

    function __construct()
    {
        $this->setSecurityCoef(rand(0, 6));
    }

    public function giveInformation()
    {
        $string = 'Application ' . $this->getName() . 'on URL ' . $this->getURL() . 'use server ' . $this->getServer() . PHP_EOL;
    }

    public function isHackable()
    {
        return false;
    }
}