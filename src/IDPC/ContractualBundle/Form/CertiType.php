<?php
namespace IDPC\ContractualBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CertiType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoria', 'choice', array(
            'empty_value' => 'Categoria',    
            'choices'   => array(
            'Empleado (Art 329 E.T.)' => '1', 
            'Trabajador por cuenta propia:' => '2',
                ),
            'required'  => true,))
            ->add('declaraclante')   
        ;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_contractualbundle_aportes_certi';
    }
}