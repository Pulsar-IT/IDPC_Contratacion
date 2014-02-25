<?php

namespace IDPC\ContractualBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContratoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('estudio')
            ->add('fechaInicio', 'date', array(
                    'label' => 'Fecha de inicio',
                    'widget' => 'single_text'
                ))
            ->add('valorPrimerPago')
            ->add('valorPagoMensual')
            ->add('valorUltimoPago')
            ->add('estudio', 'entity', array(
                'class' => 'IDPCSolicitudBundle:EstudioPrevio',
                'property' => 'id'
            ))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IDPC\ContractualBundle\Entity\Contrato'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_contractualbundle_contrato';
    }
}
