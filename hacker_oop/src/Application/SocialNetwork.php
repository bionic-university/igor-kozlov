<?php

namespace Application;


class SocialNetwork extends WebApplication implements HackableInterface
{
    use UserTrait;
    use MaterialsTrait;

    /**
     * @var array
     */
    private $messages = array(array('from' => "Vasy_Pupkin",
        'to' => 'daisy',
        'text' => 'Hello!'
    ),
        array('from' => "daisy",
            'to' => 'Vasyliy Pupkin',
            'text' => 'Hello!'
        )
    );

    private $groups = array(
        'Steve Vai', 'Metallica official page', 'Symfony community', 'NetCop'
    );

    private $communityApplications = array(
        'Happy Farm', 'Poker', 'Nano Farm'
    );

    function __construct($url = "http://vz.com", $name = "vz", $server = "apache")
    {
        $this->setSecurityCoef(rand(0, 6));
        $this->setURL($url);
        $this->setName($name);
        $this->setServer($server);
    }


    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return array
     */
    public function getCommunityApplications()
    {
        return $this->communityApplications;
    }

    /**
     * @param array $communityApplications
     */
    public function setCommunityApplications($communityApplications)
    {
        $this->communityApplications = $communityApplications;
    }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param array $groups
     */
    public function setGroups($groups)
    {
        $this->groupes = $groups;
    }


    public function giveInformation()
    {
        $string = 'Application ' . $this->getName() . 'on URL ' . $this->getURL() . 'use server ' . $this->getServer() . PHP_EOL;
        $string .= 'Users info: ' . print_r($this->getUsersInfo(), 1) . PHP_EOL;
        $string .= 'Materials: ' . print_r($this->getMaterials(), 1) . PHP_EOL;
        $string .= 'Available groups: ' . print_r($this->getGroups(), 1) . PHP_EOL;
        $string .= 'Available applications:' . print_r($this->getCommunityApplications(), 1) . PHP_EOL;
        $string .= 'User messages:' . print_r($this->getMessages(), 1) . PHP_EOL;
        return $string;
    }


    public function isHackable()
    {
        return true;
    }
}