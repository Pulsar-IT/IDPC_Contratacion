<?php

namespace Security\SecurityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserDetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoDocumento', 'choice', array(
                'choices'   =>  array(
                    'CC'    =>  'Cedula Ciudadania',
                    'CE'    =>  'Cedula Extrangeria',
                    'PA'    =>  'Pasaporte',
                    'RC'    =>  'Registro Civil',
                    'TI'    =>  'Tarjeta Identidad'
                )
            ))
            ->add('documento')
            ->add('expedicionLugar')
            ->add('expedicionDate', 'date', array(
                'label' =>  'Fecha de Espedicion',
                'widget'    =>  'single_text'
                ))  
            ->add('primerNombre')
            ->add('segundoNombre')
            ->add('primerApellido')
            ->add('segundoApellido')
            ->add('genero', 'choice', array(
                'choices'   =>  array(
                    'M'    =>  'Masculino',
                    'F'    =>  'Femenino',
                )
            ))
            ->add('fechaNacimiento', 'date', array(
                'label' =>  'Fecha de Nacimiento',
                'widget'    =>  'single_text'
                ))
            ->add('paisNacimiento')
            ->add('departamentoNacimiento')
            ->add('ciudadNacimiento')
            ->add('direccionResidencia')
            ->add('paisResidencia')
            ->add('departamentoResidencia')
            ->add('ciudadResidencia')
            ->add('telefonoFijo')
            ->add('telefonoMovil')
            ->add('area', 'entity', array(
                'class' => 'IDPCBaseBundle:Area',
                'property' => 'nombre'
            ))
            ->add('user', 'entity', array(
                'class' =>  'SecuritySecurityBundle:User',
                'property'  =>  'username'
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Security\SecurityBundle\Entity\UserDet'
        ));
    }

    public function getName()
    {
        return 'security_securitybundle_userdettype';
    }
}
