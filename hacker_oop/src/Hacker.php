<?php

class Hacker
{
    /**
     * @var string
     */
    private $fullname;
    /**
     * @var string
     */
    private $nickname;

    /**
     * @var array
     */
    private $toolsToScan = array(
        'arachni', 'ARMITAGE', 'HASHCAT', 'NetCop'
    );

    /**
     * @var array
     */
    private $toolsToSelfProtect = array(
        'ExpatShield', 'ProxyCap', 'hideIP'
    );

    /**
     * @var array
     */
    private $toolsToHack = array(
        'customTool'
    );

    function __construct($fullname, $nickname, $toolsToHack, $toolsToScan, $toolsToSelfProtect)
    {
        $this->fullname = $fullname;
        $this->nickname = $nickname;
        $this->toolsToHack = $toolsToHack;
        $this->toolsToScan = $toolsToScan;
        $this->toolsToSelfProtect = $toolsToSelfProtect;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return array
     */
    public function getToolsToScan()
    {
        return $this->toolsToScan;
    }

    /**
     * @param array $tools
     */
    public function setToolsToScan($tools)
    {
        $this->toolsToScan = $tools;
    }

    /**
     * @return array
     */
    public function getToolsToSelfProtect()
    {
        return $this->toolsToSelfProtect;
    }

    /**
     * @param array $toolsToSelfProtect
     */
    public function setToolsToSelfProtect($toolsToSelfProtect)
    {
        $this->toolsToSelfProtect = $toolsToSelfProtect;
    }

    /**
     * @return array
     */
    public function getToolsToHack()
    {
        return $this->toolsToHack;
    }

    /**
     * @param array $toolsToHuck
     */
    public function setToolsToHack($toolsToHuck)
    {
        $this->toolsToHack = $toolsToHuck;
    }


}