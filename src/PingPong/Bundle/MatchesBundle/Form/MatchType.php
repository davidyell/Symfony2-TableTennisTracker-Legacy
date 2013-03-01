<?php

namespace PingPong\Bundle\MatchesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
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
