<?php

namespace IDPC\ContractualBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PagoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mes')
            ->add('valor')
            ->add('numeroPago')
            ->add('estado')
            ->add('contrato', 'entity', array(
                'class' => 'IDPCContractualBundle:Contrato',
                'property' => 'numero'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IDPC\ContractualBundle\Entity\Pago'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_contractualbundle_pago';
    }
}
