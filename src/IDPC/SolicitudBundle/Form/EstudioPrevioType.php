<?php

namespace IDPC\SolicitudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstudioPrevioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('tipoContrato', 'entity', array(
                    'class' => 'IDPCBaseBundle:TipoContrato',
                    'property' => 'tipoContrato'
                ))
            ->add('objeto')
            ->add('valorContrato')
            ->add('plazoMeses')
            ->add('plazoDias')
            ->add('cdp', 'entity', array(
                'class' => 'IDPCBaseBundle:Cdp',
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
            'data_class' => 'IDPC\SolicitudBundle\Entity\EstudioPrevio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_solicitudbundle_estudiosprevios';
    }
}
