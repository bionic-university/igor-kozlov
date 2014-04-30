<?php


namespace Application;


class StandaloneApplication extends AbstractApplication{

    function __construct()
    {
        $this->setSecurityCoef(rand (0,6));
    }

    protected function giveInformation()
    {
        // TODO: Implement giveInformation() method.
    }
}