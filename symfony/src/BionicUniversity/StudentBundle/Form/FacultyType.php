<?php

namespace BionicUniversity\StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacultyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('shortName')
            ->add('fullName')
            ->add('university')
            ->add('cafedras');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BionicUniversity\StudentBundle\Entity\Faculty'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bionicuniversity_studentbundle_faculty';
    }
}
