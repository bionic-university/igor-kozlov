<?php
/**
 * Created by PhpStorm.
 * User: varrek
 * Date: 21.06.14
 * Time: 16:46
 */
namespace BionicUniversity\UserBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use BionicUniversity\UserBundle\Entity\User;
class Registration {
    /**
     * @Assert\Type(type="BionicUniversity\UserBundle\Entity\User")
     * @Assert\Valid()
     */
    protected $user;


    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
} 