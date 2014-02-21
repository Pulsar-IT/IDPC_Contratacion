<?php

namespace IDPC\SolicitudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstudiosPreviosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objeto')
            ->add('valorContrato')
            ->add('plazoMeses')
            ->add('plazoDias')
            ->add('created_at')
            ->add('update_at')
            ->add('contrato')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IDPC\SolicitudBundle\Entity\EstudiosPrevios'
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
