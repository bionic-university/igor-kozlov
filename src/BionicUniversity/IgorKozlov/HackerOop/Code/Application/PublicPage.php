<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Code\Application;

/**
 * Class PublicPage
 *
 * @package BionicUniversity\IgorKozlov\HackerOop\Code\Application
 */
class PublicPage extends WebApplication implements HackableInterface
{
    use MaterialsTrait;

    /**
     * @var string
     */
    private $publications;

    /**
     * @param string $url
     * @param string $name
     * @param string $server
     * @param array  $publications
     */
    public function __construct($url = "http://imaginarium.in.ua", $name = "Igor Kozlov blog", $server = "NGINX", $publications = array('Steve Vai', 'Metallica official page'))
    {
        $this->setSecurityCoef(rand(0, 6));
        $this->setURL($url);
        $this->setName($name);
        $this->setServer($server);
        $this->publications = $publications;
    }

    /**
     * @return string
     */
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * @param string $publications
     */
    public function setPublications($publications)
    {
        $this->publications = $publications;
    }

    /**
     * @return mixed
     */
    public function giveInformation()
    {
        $string = 'Application ' . $this->getName() . 'on URL ' . $this->getURL() . ' use server ' . $this->getServer() . PHP_EOL;
        $string .= 'Available publications: ' . print_r($this->getPublications(), 1) . PHP_EOL;

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
