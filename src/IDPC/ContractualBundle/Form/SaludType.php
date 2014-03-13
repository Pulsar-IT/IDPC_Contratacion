<?php

namespace IDPC\ContractualBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SaludType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Referencia')
            ->add('Referencia', 'choice', array(
            'empty_value' => 'Entidad',    
            'choices'   => array(
            'CAFESALUD EPS'=>'CAFESALUD EPS',
            'CAPRECOM'=>'CAPRECOM',
            'CCF COMFENALCO ANTIOQUIA'=>'CCF COMFENALCO ANTIOQUIA',
            'COLMEDICA E.P.S'=>'COLMEDICA E.P.S',
            'COMFENALCO VALLE'=>'COMFENALCO VALLE',
            'COMPENSAR'=>'COMPENSAR',
            'COOMEVA EPS S.A.'=>'COOMEVA EPS S.A.',
            'CRUZBLANCA S.A.'=>'CRUZBLANCA S.A.',
            'E.P.S. FAMISANAR LTDA'=>'E.P.S. FAMISANAR LTDA',
            'E.P.S. SANITAS S.A.'=>'E.P.S. SANITAS S.A.',
            'EPS SURA (ANTES SUSALUD)'=>'EPS SURA (ANTES SUSALUD)',
            'FOSYGA'=>'FOSYGA',
            'GOLDEN GROUP S.A. EPS'=>'GOLDEN GROUP S.A. EPS',
            'HUMANA VIVIR S.A. EPS'=>'HUMANA VIVIR S.A. EPS',
            'NUEVA EPS S.A'=>'NUEVA EPS S.A',
            'REDSALUD ATENCION HUMANA EPS S.A.'=>'REDSALUD ATENCION HUMANA EPS S.A.',
            'SALUD COLPATRIA S.A.'=>'SALUD COLPATRIA S.A.',
            'SALUD TOTAL'=>'SALUD TOTAL',
            'SALUD TOTAL S.A. EPS ARS'=>'SALUD TOTAL S.A. EPS ARS',
            'SALUDCOLOMBIA EPS S.A.'=>'SALUDCOLOMBIA EPS S.A.',
            'SALUDCOOP EPS'=>'SALUDCOOP EPS',
            'SALUDVIDA S.A. EPS'=>'SALUDVIDA S.A. EPS',
            'SERVICIO OCCIDENTAL DE SALUD SA SOS'=>'SERVICIO OCCIDENTAL DE SALUD SA SOS',
            'SOLIDARIA DE SALUD SOLSALUD SA'=>'SOLIDARIA DE SALUD SOLSALUD SA'             
                ),
            'required'  => true,))
            ->add('valor')
            ->add('file', 'file', array(
                'required' => true,
                'label'   => 'Archivo'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IDPC\ContractualBundle\Entity\Aportes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idpc_contractualbundle_aportes_salud';
    }
}
