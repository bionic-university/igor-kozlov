<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Code\Application;

/**
 * Class StandaloneApplication
 * @package BionicUniversity\IgorKozlov\HackerOop\Code\Application
 */

class StandaloneApplication extends AbstractApplication implements HackableInterface
{

    /**
     * Random coeff
     */
    public function __construct()
    {
        $this->setSecurityCoef(rand(0, 6));
    }

    /**
     * @return String
     */
    public function giveInformation()
    {
        return 'Application ' . $this->getName() . 'on URL ' . $this->getURL() . 'use server ' . $this->getServer() . PHP_EOL;
    }

    /**
     * @return bool
     */
    public function isHackable()
    {
        return false;
    }
}
