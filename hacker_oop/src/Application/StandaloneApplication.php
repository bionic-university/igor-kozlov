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
        // TODO: Implement giveInformation() method.
    }

    public function isHackable()
    {
        return false;
    }
}