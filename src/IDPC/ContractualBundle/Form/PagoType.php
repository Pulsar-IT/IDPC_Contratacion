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
                ->add('mes', 'choice', array(
                    'choices' => array(
                        'empty_value' => '--Seleccione Mes--',
                        'Enero' => 'Enero',
                        'Febrero' => 'Febrero',
                        'Marzo' => 'Marzo',
                        'Abril' => 'Abril',
                        'Mayo' => 'Mayo',
                        'Junio' => 'Junio',
                        'Julio' => 'Julio',
                        'Agosto' => 'Agosto',
                        'Septiembre' => 'Septiembre',
                        'Octubre' => 'Octubre',
                        'Noviembre' => 'Noviembre',
                        'Diciembre' => 'Diciembre',
                    ),
                    'label' => 'Mes'
                ))
            ->add('valor')
            ->add('valorAportes')
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
            'data_class' => 'IDPC\ContractualBundle\Entity\Pago',
            'cascada_validation' => true
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
