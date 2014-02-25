<?php

namespace Security\SecurityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('password', 'password')
            //->add('salt')
            ->add('user_roles')
            ->add('userdet', new UserDetType())
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Security\SecurityBundle\Entity\User',
            'cascada_validation' => true
        ));
    }

    public function getName()
    {
        return 'security_securitybundle_usertype';
    }
}
