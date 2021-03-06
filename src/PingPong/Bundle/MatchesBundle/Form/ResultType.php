<?php
/**
 * Match result form
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\MatchesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Create a form to capture match results
 */
class ResultType extends AbstractType
{
    /**
     * Create the form
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array                                        $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('player', 'entity', array(
                    'class' => 'PingPongPlayerBundle:Player',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('p')
                            ->orderBy('p.firstName', 'ASC');
                    },
                ))
                ->add('score');
    }

    /**
     * Set the default class for this form
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'PingPong\Bundle\MatchesBundle\Entity\Result'
        ));
    }

    /**
     * Return the name of the form
     *
     * @return string
     */
    public function getName()
    {
        return 'pingpong_bundle_matchbundle_resulttype';
    }

}