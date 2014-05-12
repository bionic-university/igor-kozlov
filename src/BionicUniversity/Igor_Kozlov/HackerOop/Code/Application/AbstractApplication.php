<?php

namespace BionicUniversity\Igor_Kozlov\HackerOop\Code\Application;


abstract class AbstractApplication
{
    /**
     * @var int
     */
    private $securityCoef;

    /**
     * @param $securityCoef
     */
    function __construct($securityCoef)
    {
        $this->securityCoef = $securityCoef;
    }

    /**
     * @return mixed
     */
    public function getSecurityCoef()
    {
        return $this->securityCoef;
    }

    /**
     * @param mixed $securityCoef
     */
    public function setSecurityCoef($securityCoef)
    {
        $this->securityCoef = $securityCoef;
    }

    /**
     * @return mixed
     */
    abstract public function giveInformation();


} 