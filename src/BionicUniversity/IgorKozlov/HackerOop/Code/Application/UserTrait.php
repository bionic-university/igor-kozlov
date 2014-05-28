<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Code\Application;

/**
 * Class UserTrait
 *
 * @package BionicUniversity\IgorKozlov\HackerOop\Code\Application
 */
trait UserTrait
{
    /**
     * @var array
     */
    private $usersInfo = array(array('username' => "Vasy_Pupkin",
        'realName' => 'Vasyliy Pupkin',
        'password' => '123456',
        'moneyOnAccount' => 15
    ),
        array('username' => "daisy",
            'realName' => 'Dima Drim',
            'password' => '0.75#hfkd',
            'moneyOnAccount' => 25,
        ),
        array('username' => "orchid",
            'realName' => 'Dima Goit',
            'password' => '0.75#fdhfkd',
            'moneyOnAccount' => 7
        )
    );

    /**
     * @return array
     */
    public function getUsersInfo()
    {
        return $this->usersInfo;
    }

    /**
     * @param array $usersInfo
     */
    public function setUsersInfo($usersInfo)
    {
        $this->usersInfo = $usersInfo;
    }

}
