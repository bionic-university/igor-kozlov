<?php

namespace Application;


class Emails extends WebApplication{
    private $username;
    private $password;

    function __construct($URL, $name, $server, $password, $username)
    {
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
    protected function giveInformation()
    {
        return 'Ha-Ha! You cant hack email!'.PHP_EOL;
    }

} 