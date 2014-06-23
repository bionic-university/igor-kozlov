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

/**
 * Class RegistrationType
 *
 * @package BionicUniversity\UserBundle\Form\Type
 */
class RegistrationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user', new UserType());
        $builder->add('Register', 'submit');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'registration';
    }
} 