<?php

namespace IDPC\ContractualBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CertificacionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoria', 'choice', array(
            'empty_value' => ' ',    
            'choices'   => array(
            'empleado' => 'Empleado (Art 329 E.T.)', 
            'independiente' => 'Trabajador por cuenta propia',
                ),
            'required'  => true,))
            
              ->add('declararenta', 'choice', array(
            'empty_value' => ' ',    
            'choices'   => array(
            1 => 'SI', 
            0 => 'NO',
                ),    
           'required'  => true,))  
            ->add('file', 'file', array(
                'label' => ' '))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IDPC\ContractualBundle\Entity\Certificacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_contractualbundle_certificacion';
    }
}
