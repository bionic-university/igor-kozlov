<?php

namespace BionicUniversity\StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Faculty
 */
class Faculty
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $fullName;
    /*
     * @var University
     */
    private $university;

    /**
     * @var ArrayCollection
     */
    private $cafedras;

    /**
     * @return ArrayCollection
     */
    public function getCafedras()
    {
        return $this->cafedras;
    }

    /**
     * @param ArrayCollection $cafedras
     */
    public function setCafedras($cafedras)
    {
        $this->cafedras = $cafedras;
    }

    /**
     * @param University $university
     */
    public function setUniversity($university)
    {
        $this->university = $university;
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
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Faculty
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Faculty
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return University
     */
    public function getUniversity()
    {
        return $this->university;
    }

    /**
     * @return mixed
     */
    public function getUniversityShortName()
    {
        return $this->university->getShortName();
    }

    public function __toString()
    {
        return $this->getShortName();
    }


}
