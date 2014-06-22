<?php

namespace BionicUniversity\UnusedcssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TestResult
 */
class TestResult
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var String
     */
    private $url;

    /**
     * @var String
     */
    private $unusedClasses;

    /**
     * @var String
     */
    private $unusedIds;

    /*
    * @var User
    */
    private $user;

    /**
     * @var ArrayCollection
     */
    private $links;

    public function __construct()
    {
        $this->links = new ArrayCollection();
        $this->unusedClasses = new ArrayCollection();
        $this->unusedIds = new ArrayCollection();
    }


    /**
     * @return ArrayCollection
     */
    public function getLinks()
    {
        return $this->links->toArray();
    }


    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
     * Set unusedClasses
     *
     * @param String $unusedCSS
     */
    public function setUnusedClasses($unusedCSS)
    {
        $this->unusedClasses = $unusedCSS;
    }

    /**
     * Get unusedClasses
     *
     * @return String
     */
    public function getUnusedClasses()
    {
        return $this->unusedClasses;
    }

    /**
     * @return String
     */
    public function getUnusedIds()
    {
        return $this->unusedIds;
    }

    /**
     * @param String $unusedIds
     */
    public function setUnusedIds($unusedIds)
    {
        $this->unusedIds = $unusedIds;
    }

    /**
     * @return String
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param String $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }



}
