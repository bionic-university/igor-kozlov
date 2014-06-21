<?php
/**
 * Created by PhpStorm.
 * User: varrek
 * Date: 21.06.14
 * Time: 16:23
 */

namespace BionicUniversity\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user', new UserType());
        $builder->add('Register', 'submit');
    }

    public function getName()
    {
        return 'registration';
    }
} 