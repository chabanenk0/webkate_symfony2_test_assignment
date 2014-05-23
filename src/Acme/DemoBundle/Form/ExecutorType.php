<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExecutorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('middleName')
            ->add('lastName')
            ->add('birthday')
            ->add('careerBeginningDate')
            ->add('phone')
            ->add('email')
            ->add('skype')
            ->add('technologiesUsing')
            ->add('projects')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\DemoBundle\Entity\Executor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_demobundle_executor';
    }
}
