<?php

namespace IDPC\ContractualBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InformeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion')
            ->add('file')
            ->add('pago', 'entity', array(
                'class' => 'IDPCContractualBundle:Pago',
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
            'data_class' => 'IDPC\ContractualBundle\Entity\Informe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_contractualbundle_informe';
    }
}
