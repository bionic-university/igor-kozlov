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
     * @var string
     */
    private $cssOnPage;

    /**
     * @var string
     */
    private $cssInStylesheet;

    /**
     * @var string
     */
    private $unusedCSS;

    /*
    * @var User
    */
    private $user;

    /**
     * @var ArrayCollection
     */
    private $links;

    /**
     * @return ArrayCollection
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param ArrayCollection $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
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
     * Set cssOnPage
     *
     * @param string $cssOnPage
     * @return TestResult
     */
    public function setCssOnPage($cssOnPage)
    {
        $this->cssOnPage = $cssOnPage;

        return $this;
    }

    /**
     * Get cssOnPage
     *
     * @return string
     */
    public function getCssOnPage()
    {
        return $this->cssOnPage;
    }

    /**
     * Set cssInStylesheet
     *
     * @param string $cssInStylesheet
     * @return TestResult
     */
    public function setCssInStylesheet($cssInStylesheet)
    {
        $this->cssInStylesheet = $cssInStylesheet;

        return $this;
    }

    /**
     * Get cssInStylesheet
     *
     * @return string
     */
    public function getCssInStylesheet()
    {
        return $this->cssInStylesheet;
    }

    /**
     * Set unusedCSS
     *
     * @param string $unusedCSS
     * @return TestResult
     */
    public function setUnusedCSS($unusedCSS)
    {
        $this->unusedCSS = $unusedCSS;

        return $this;
    }

    /**
     * Get unusedCSS
     *
     * @return string
     */
    public function getUnusedCSS()
    {
        return $this->unusedCSS;
    }
}
