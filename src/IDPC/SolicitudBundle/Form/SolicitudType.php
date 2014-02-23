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
            ->add('fechaCierre')
            ->add('estadoSolicitud')
            ->add('estadoProceso')
            ->add('observaciones')
            ->add('created_at')
            ->add('update_at')
            ->add('cdp')
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
