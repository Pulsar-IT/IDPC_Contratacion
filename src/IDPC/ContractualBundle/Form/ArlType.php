<?php

namespace IDPC\ContractualBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArlType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Referencia')
            ->add('Referencia', 'choice', array(
            'empty_value' => 'Entidad',    
            'choices'   => array(
            'SURA' => 'SURA', 
            'POSITIVA' => 'POSITIVA',
            'COLPATRIA' => 'COLPATRIA', 
             'LIBERTY' => 'LIBERTY'
                ),
            'required'  => true,))
            ->add('valor')
            ->add('file', 'file', array(
                'required' => false,
                'label'   => 'Archivo'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IDPC\ContractualBundle\Entity\Aportes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_contractualbundle_aportes_arl';
    }
}