<?php

namespace IDPC\SolicitudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SolicitudType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('fechaCierre', 'date', array(
                    'label' => 'Fecha Cierre',
                    'widget' => 'single_text'
                ))
            ->add('estadoSolicitud')
            ->add('estadoProceso')
            ->add('observaciones')
            ->add('area', 'entity', array(
                'class' => 'IDPCBaseBundle:Area',
                'property' => 'sigla'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IDPC\SolicitudBundle\Entity\Solicitud'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_solicitudbundle_solicitud';
    }
}
