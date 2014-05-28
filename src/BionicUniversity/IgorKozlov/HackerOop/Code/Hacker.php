<?php
namespace BionicUniversity\IgorKozlov\HackerOop\Code;

/**
 * Class Hacker
 *
 * @package BionicUniversity\IgorKozlov\HackerOop\Code
 */
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
     * @var int
     */
    private $proficiency;

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

    /**
     * @param string $fullname
     * @param string $nickname
     */
    public function __construct($fullname = "", $nickname = "")
    {
        $this->proficiency = rand(0, 10);
        $this->fullname = $fullname;
        $this->nickname = $nickname;
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
     * @return int
     */
    public function getProficiency()
    {
        return $this->proficiency;
    }

    /**
     * @param int $proficiency
     */
    public function setProficiency($proficiency)
    {
        $this->proficiency = $proficiency;
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

    /**
     * @param $string
     *
     * @return string
     */
    public function hack($string)
    {
        $result = "";
        if (class_exists('BionicUniversity\\IgorKozlov\\HackerOop\\Code\\Application\\' . $string)) {
            $name = 'BionicUniversity\IgorKozlov\HackerOop\Code\Application\\' . $string;
            $object = new $name;
            $myReflection = new \ReflectionClass($object);
            if ($myReflection->isSubclassOf('BionicUniversity\IgorKozlov\HackerOop\Code\Application\AbstractApplication')) {
                if ($object->isHackable()) {
                    echo "Hacker proficiency: " . $this->getProficiency() . PHP_EOL;
                    echo "Application securityCoef: " . $object->getSecurityCoef() . PHP_EOL;
                    if ($object->getSecurityCoef() < $this->getProficiency() + rand(-2, 2)) {
                        $result = "Hacked!" . PHP_EOL;
                        $result .= $object->giveInformation();
                    } else {
                        $result = "Not hacked!" . PHP_EOL;
                    }
                } else {
                    $result = "You cant hack this!!!" . PHP_EOL;
                }
            } else {
                $result = "This class is not a program!!!" . PHP_EOL;
            }
        } else {
            $result = "Wrong class name!!!" . PHP_EOL;
        }

        return $result;
    }

}
