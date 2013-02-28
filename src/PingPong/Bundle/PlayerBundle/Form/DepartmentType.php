<?php

namespace PingPong\Bundle\PlayerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('players', 'entity', array(
                    'class' => 'PingPongPlayerBundle:Player',
                    'multiple' => true
                    )
                );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PingPong\Bundle\PlayerBundle\Entity\Department'
        ));
    }

    public function getName()
    {
        return 'pingpong_bundle_playerbundle_departmenttype';
    }
}
