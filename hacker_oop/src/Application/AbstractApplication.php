<?php

namespace Application;


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
    abstract protected function giveInformation();


} 