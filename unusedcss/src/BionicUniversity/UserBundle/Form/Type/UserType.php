<?php
/**
 * Created by PhpStorm.
 * User: varrek
 * Date: 21.06.14
 * Time: 16:18
 */
namespace BionicUniversity\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email');
        $builder->add('username', 'text',array(
            'required' => true,
        ));
        $builder->add('password', 'repeated', array(
            'first_name'  => 'password',
            'second_name' => 'confirm',
            'type'        => 'password',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BionicUniversity\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'user';
    }
} 