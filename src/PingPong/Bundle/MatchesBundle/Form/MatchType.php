<?php

namespace PingPong\Bundle\MatchesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Form class for capturing Matches
 */
class MatchType extends AbstractType
{
    /**
     * Create the form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('matchType', 'entity', array(
                'class' => 'PingPongMatchesBundle:MatchType',
                'property' => 'name',
            )
        )
        ->add('results', 'collection', array(
                'type' => new ResultType(),
                'allow_add' => true,
                'by_reference' => false,
            )
        )
        ->add('notes');
    }

    /**
     * Set the default data class for this form
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PingPong\Bundle\MatchesBundle\Entity\Match',
            'cascade_validation' => true
        ));
    }

    /**
     * Get the name of this form
     *
     * @return string
     */
    public function getName()
    {
        return 'pingpong_bundle_matchbundle_matchtype';
    }
}
