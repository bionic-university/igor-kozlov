<?php

namespace BionicUniversity\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $username;
    /*
     * @var array
     */
    private $roles;
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var ArrayCollection
     */
    private $tests;

    public function __construct()
    {
        $this->salt = md5(uniqid(null, true));
        $this->tests = new ArrayCollection();
        $this->roles = new ArrayCollection();
    }
    /**
     * Serializes the content of the current User object
     * @return string
     */
    public function serialize()
    {
        return \json_encode(
            array($this->username, $this->password, $this->salt,
                $this->roles, $this->id));
    }

    /**
     * Unserializes the given string in the current User object
     * @param serialized
     */
    public function unserialize($serialized)
    {
        list($this->username, $this->password, $this->salt,
            $this->roles, $this->id) = \json_decode(
            $serialized);
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    /**
     * @return ArrayCollection
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $plainPassword
     * @return User
     */
    public function setPassword($plainPassword)
    {
        $this->password = $plainPassword;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    public function addRole(\BionicUniversity\UserBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    public function __toString()
    {
        return $this->getUsername();
    }


}
