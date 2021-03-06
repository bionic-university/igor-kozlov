<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Code\Application;

/**
 * Class Forum
 *
 * @package BionicUniversity\IgorKozlov\HackerOop\Code\Application
 */
class Forum extends WebApplication implements HackableInterface
{
    use UserTrait;
    use MaterialsTrait;

    /**
     * @var array
     */
    private $topics = array(array('theme' => "Vasy_Pupkin",
        'text' => 'Hello! Lets disquss..'
    ),
        array('theme' => "daisy",
            'text' => 'Hello! Lets disquss..'
        )
    );

    /**
     * @param string $url
     * @param string $name
     * @param string $server
     */
    public function __construct($url = "http://0week.kiev.ua", $name = "0week", $server = "NGINX")
    {
        $this->setSecurityCoef(rand(0, 6));
        $this->setURL($url);
        $this->setName($name);
        $this->setServer($server);
    }

    /**
     * @return array
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * @param array $topics
     */
    public function setTopics($topics)
    {
        $this->topics = $topics;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) ($this->value);
    }

    /**
     * @return string
     */
    public function giveInformation()
    {
        $string = 'Application ' . $this->getName() . 'on URL ' . $this->getURL() . 'use server ' . $this->getServer() . PHP_EOL;
        $string .= 'Users info: ' . print_r($this->getUsersInfo(), 1) . PHP_EOL;
        $string .= 'Materials: ' . print_r($this->getMaterials(), 1) . PHP_EOL;
        $string .= 'Available topics: ' . print_r($this->getTopics(), 1) . PHP_EOL;

        return $string;
    }

    /**
     * @return bool
     */
    public function isHackable()
    {
        return true;
    }
}
