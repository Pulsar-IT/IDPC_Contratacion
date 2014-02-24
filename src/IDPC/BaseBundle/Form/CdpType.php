<?php

namespace IDPC\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CdpType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('objeto')
            ->add('valor')
            ->add('fecha', 'date', array(
                    'label' => 'Fecha',
                    'widget' => 'single_text'
                ))
            ->add('oficio')
            ->add('proyecto')
            ->add('proyecto', 'entity', array(
                'class' => 'IDPCBaseBundle:ProyectoInversion',
                'property' => 'codigo'
            ))
            ->add('fuente')
            ->add('concepto')
            ->add('producto')
            ->add('file')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IDPC\BaseBundle\Entity\Cdp'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_basebundle_cdp';
    }
}
