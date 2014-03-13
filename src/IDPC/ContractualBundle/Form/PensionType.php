<?php

namespace IDPC\ContractualBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PensionType extends AbstractType
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
            'CAJA NACIONAL DE PREVISION SOCIAL'=>'CAJA NACIONAL DE PREVISION SOCIAL',
            'CAJANAL'=>'CAJANAL',
            'CAPRECOM'=>'CAPRECOM',
            'FONDO ALTERNATIVO DE PENSIONES SKANDIA'=>'FONDO ALTERNATIVO DE PENSIONES SKANDIA',
            'FONDO DE PENSIONES HORIZONTE'=>'FONDO DE PENSIONES HORIZONTE',
            'FONDO DE PENSIONES SANTANDER / ING'=>'FONDO DE PENSIONES SANTANDER / ING',
            'FONDO DE PREVISION SOCIAL DEL CONGRESO'=>'FONDO DE PREVISION SOCIAL DEL CONGRESO',
            'FONDO OBLIGATORIO DE PENSIONES SKANDIA'=>'FONDO OBLIGATORIO DE PENSIONES SKANDIA',
            'INSTITUTO DE SEGUROS SOCIALES'=>'INSTITUTO DE SEGUROS SOCIALES',
            'PENSIONADO'=>'PENSIONADO',
            'PENSIONES DE ANTIOQUIA'=>'PENSIONES DE ANTIOQUIA',
            'PENSIONES OBLIGATORIAS COLFONDOS'=>'PENSIONES OBLIGATORIAS COLFONDOS',
            'PENSIONES Y CESANTIAS PORVENIR SA'=>'PENSIONES Y CESANTIAS PORVENIR SA',
            'PROTECCION FONDO DE PENSIONES'=>'PROTECCION FONDO DE PENSIONES'
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
        return 'idpc_contractualbundle_aportes_pension';
    }
}