<?php

namespace IDPC\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProyectoInversionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('codigo')
            ->add('descripcion')
            ->add('vigencia')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IDPC\BaseBundle\Entity\ProyectoInversion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_basebundle_proyectoinversion';
    }
}
