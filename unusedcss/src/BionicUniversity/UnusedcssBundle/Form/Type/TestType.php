<?php
/**
 * Created by PhpStorm.
 * User: varrek
 * Date: 22.06.14
 * Time: 12:05
 */
namespace BionicUniversity\UnusedcssBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TestType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', 'url')
            ->add('go!', 'submit');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'test';
    }

} 