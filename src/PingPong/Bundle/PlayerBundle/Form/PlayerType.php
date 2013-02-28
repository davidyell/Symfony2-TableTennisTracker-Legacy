<?php
/**
 * Form class for editing and creating players
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\PlayerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * PlayerType Class
 */
class PlayerType extends AbstractType
{

    /**
     * Return the name of this form
     *
     * @return string
     */
    public function getName()
    {
        return 'player';
    }

    /**
     * Create a form for the basic player fields
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('firstName', 'text')
            ->add('nickname', 'text', array(
                    'required' => false
                )
            )
            ->add('lastName', 'text')
            ->add('email', 'text')
            ->add('facebookId', 'text', array(
                'label' => 'Facebook page name or id', 
                'required' => false
                )
            )
            ->add('department', 'entity', array(
                'class' => 'PingPongPlayerBundle:Department',
                'property' => 'name'
                )
            );
    }

    /**
     * Set default data class for the form if and or when it's embedding
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'PingPong\Bundle\PlayerBundle\Entity\Player'
        ));
    }


}