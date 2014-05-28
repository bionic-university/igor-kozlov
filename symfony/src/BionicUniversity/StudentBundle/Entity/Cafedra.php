<?php

namespace BionicUniversity\StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cafedra
 */
class Cafedra
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $roomNumber;

    /**
     * @var ArrayCollection
     */
    private $students;

    /**
     * @var Faculty
     */
    private $faculty;

    /**
     * @return Faculty
     */
    public function getFaculty()
    {
        return $this->faculty;
    }

    /**
     * @param Faculty $faculty
     */
    public function setFaculty($faculty)
    {
        $this->faculty = $faculty;
    }

    /**
     * @return ArrayCollection
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * @param ArrayCollection $students
     */
    public function setStudents($students)
    {
        $this->students = $students;
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
     * Set roomNumber
     *
     * @param integer $roomNumber
     *
     * @return Cafedra
     */
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    /**
     * Get roomNumber
     *
     * @return integer
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    public function __toString()
    {
        return (string)$this->roomNumber;
    }
}
