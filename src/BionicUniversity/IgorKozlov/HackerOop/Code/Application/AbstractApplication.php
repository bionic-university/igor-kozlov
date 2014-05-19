<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Code\Application;


/**
 * Class AbstractApplication
 * @package BionicUniversity\IgorKozlov\HackerOop\Code\Application
 */
abstract class AbstractApplication
{
    /**
     * @var int
     */
    private $securityCoef;

    /**
     * @param $securityCoef
     */
    public function __construct($securityCoef)
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