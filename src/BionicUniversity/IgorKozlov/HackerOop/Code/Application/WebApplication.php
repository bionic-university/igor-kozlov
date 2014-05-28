<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Code\Application;

/**
 * Class WebApplication
 *
 * @package BionicUniversity\IgorKozlov\HackerOop\Code\Application
 */
class WebApplication extends AbstractApplication
{

    /**
     * @var string
     */
    private $URL;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $server;

    /**
     * @param $URL
     * @param $name
     * @param $server
     */
    public function __construct($URL, $name, $server)
    {
        $this->URL = $URL;
        $this->name = $name;
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function getURL()
    {
        return $this->URL;
    }

    /**
     * @param mixed $URL
     */
    public function setURL($URL)
    {
        $this->URL = $URL;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function giveInformation()
    {
        return 'Application ' . $this->getName() . 'on URL ' . $this->getURL() . 'use server ' . $this->getServer() . PHP_EOL;
    }
}
