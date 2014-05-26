<?php

namespace BionicUniversity\StudentBundle\Entity;


/**
 * University
 */
class University
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var integer
     */
    private $accreditationLevel;

    /**
     * @var \DateTime
     */
    private $yearOfFoundation;


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
     * Set fullName
     *
     * @param string $fullName
     *
     * @return University
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
     * Set shortName
     *
     * @param string $shortNAme
     *
     * @return University
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
     * Set accreditationLevel
     *
     * @param integer $accreditationLevel
     *
     * @return University
     */
    public function setAccreditationLevel($accreditationLevel)
    {
        $this->accreditationLevel = $accreditationLevel;

        return $this;
    }

    /**
     * Get accreditationLevel
     *
     * @return integer 
     */
    public function getAccreditationLevel()
    {
        return $this->accreditationLevel;
    }

    /**
     * Set yearOfFoundation
     *
     * @param \DateTime $yearOfFoundation
     *
     * @return University
     */
    public function setYearOfFoundation($yearOfFoundation)
    {
        $this->yearOfFoundation = $yearOfFoundation;

        return $this;
    }

    /**
     * Get yearOfFoundation
     *
     * @return \DateTime 
     */
    public function getYearOfFoundation()
    {
        return $this->yearOfFoundation;
    }
}
