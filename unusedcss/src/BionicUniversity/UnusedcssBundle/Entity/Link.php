<?php

namespace BionicUniversity\UnusedcssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 */
class Link
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $validationResult;

    /**
     * @var TestResult
     */
    private $test;

    /**
     * @return TestResult
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param TestResult $test
     */
    public function setTest($test)
    {
        $this->test = $test;
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
     * Set link
     *
     * @param string $link
     * @return Link
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set validationResult
     *
     * @param string $validationResult
     * @return Link
     */
    public function setValidationResult($validationResult)
    {
        $this->validationResult = $validationResult;

        return $this;
    }

    /**
     * Get validationResult
     *
     * @return string
     */
    public function getValidationResult()
    {
        return $this->validationResult;
    }
}
