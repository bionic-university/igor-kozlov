<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Code\Application;

/**
 * Class Emails
 *
 * @package BionicUniversity\IgorKozlov\HackerOop\Code\Application
 */
class Emails extends WebApplication implements HackableInterface
{
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;

    /**
     * @param string $URL
     * @param string $name
     * @param string $server
     * @param string $password
     * @param string $username
     */
    public function __construct($URL = "http://mail.com", $name = "mail", $server = "apache", $password = "test", $username = "test")
    {
        $this->setSecurityCoef(rand(20, 60));
        $this->setURL($URL);
        $this->setName($name);
        $this->setServer($server);
        $this->password = $password;
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function giveInformation()
    {
        return 'Ha-Ha! You cant hack email!' . PHP_EOL;
    }

    /**
     * @return bool
     */
    public function isHackable()
    {
        return false;
    }
}
