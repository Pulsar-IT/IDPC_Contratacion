<?php

namespace IDPC\BaseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use IDPC\BaseBundle\Entity\Area;
use IDPC\BaseBundle\Entity\TipoContrato;
use IDPC\BaseBundle\Entity\ProyectoInversion;
use IDPC\BaseBundle\Entity\Cdp;

class LoadBaseData extends AbstractFixture {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        # Carga de Tipos de Contrato
        
        $tiposcontratos = array(
            'profesionales' => array(
                'tipocontrato' => 'Prestacion de Servicios Profesionales'
            ),
            'apoyo' => array(
                'tipocontrato' => 'Prestación de Servicios de Apoyo a la Gestión'
            )
        );

        foreach ($tiposcontratos as $referencia => $nombretipocontrato) {

            $tipocontrato = new TipoContrato();

            foreach ($nombretipocontrato as $propiedad => $value) {
                $tipocontrato->{'set' . ucfirst($propiedad)}($value);
            }

            $this->addReference($referencia, $tipocontrato);
            $manager->persist($tipocontrato);
        }
        $manager->flush();
        
                # Carga de Tipos de Contrato
        
        $areas = array(
            'SDG' => array(
                'nombre' => 'Sub Direccion General',
                'sigla' => 'SDG'
            ),
            'DIV' => array(
                'nombre' => 'Divulgacion',
                'sigla' => 'DIV'
            ),
            'SDC' => array(
                'nombre' => 'Sub Dirección Corporativa',
                'sigla' => 'SDC'
            ),
            'DIR' => array(
                'nombre' => 'Direccion',
                'sigla' => 'DIR'
            ),
            'STI' => array(
                'nombre' => 'Subdirección Técnica de Intervención',
                'sigla' => 'STI'
            ),
            'SDVPC' => array(
                'nombre' => 'Subdirección de Divulgación de los valores del Patrimonio Cultural',
                'sigla' => 'SDVPC'
            ),
            'AJ' => array(
                'nombre' => 'Asesora Jurídica',
                'sigla' => 'AJ'
            ),
            'JOCI' => array(
                'nombre' => 'Control Interno',
                'sigla' => 'JOCI'
            ),
        );

        foreach ($areas as $referencia => $areaName) {

            $area = new Area();
            
            foreach ($areaName as $propiedad => $value) {
                $area->{'set' . ucfirst($propiedad)}($value);
            }
            $this->addReference($referencia, $area);
            $manager->persist($area);
        }
        $manager->flush();
        
        # Add Proyectos de Inversión 
        
        $proyectos = array(
            '911' => array(
                'id' => '911',
                'codigo' => '3-3-1-14-01-03-0911',
                'descripcion' => 'Jornada Educativa Única para la Excelencia Académica y la Formación Integral'
            ),
            '498' => array(
                'id' => '498',
                'codigo' => '3-3-1-14-01-08-0498',
                'descripcion' => 'Gestión e Intervención del Patrimonio Cultural Material del Distrito Capital'
            ),
            '746' => array(
                'id' => '746',
                'codigo' => '3-3-1-14-01-08-0746-144',
                'descripcion' => 'Circulación y Divulgación de los Valores del Patrimonio Cultural'
            ),
            '440' => array(
                'id' => '440',
                'codigo' => '3-3-1-14-01-16-0440-177',
                'descripcion' => 'Revitalización del Centro Tradicional y de Sectores e Inmuebles de Interés Cultural en el Distrito Capital'
            ),
            '942' => array(
                'id' => '942',
                'codigo' => '3-3-1-14-03-26-0942',
                'descripcion' => 'Transparencia en la Gestión Institucional'
            ),
            '733' => array(
                'id' => '733',
                'codigo' => '3-3-1-14-03-31-0733',
                'descripcion' => 'Fortalecimiento y Mejoramiento de la Gestión Institucional'
            ),
            '7' => array(
                'id' => '7',
                'codigo' => 'Funcionamiento',
                'descripcion' => 'Funcionamiento'
            ),
        );
        foreach ($proyectos as $referencia => $proyectoName) {

            $proyecto = new ProyectoInversion();
            foreach ($proyectoName as $propiedad => $value) {
                $proyecto->{'set' . ucfirst($propiedad)}($value);
            }
            $this->addReference($referencia, $proyecto);
            $manager->persist($proyecto);
        }
        $manager->flush();
        
        
        # Add CDP
        
        $cdps = array(
            '0002-3' => array('numero' => '0002-3', 'objeto' => 'Contratar los servicios del personal de apoyo y de gestión para el cumplimiento del proyecto 0911 Jornada Educativa Única para la Excelencia Académica y la Formación Integral.', 'valor' => '230000000', 'fecha' => new \DateTime('2014-02-01') , 'oficio' => 'na', 'proyecto' => $manager->merge($this->getReference('911')), 'fuente' => '01-12', 'concepto' => '0335', 'producto' => '9',),
            '0003-3' => array('numero' => '0003-3', 'objeto' => 'Contratar los servicios del personal de apoyo y de gestión para el cumplimiento del proyecto 0911 Jornada Educativa Única para la Excelencia Académica y la Formación Integral.', 'valor' => '38000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('911')), 'fuente' => '01-12', 'concepto' => '0001', 'producto' => '9',),
            '33' => array('numero' => '33', 'objeto' => 'Contratar los servicios de personal de apoyo y gestión para el cumplimiento del proyecto 911', 'valor' => '539251712', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('911')), 'fuente' => '01-12', 'concepto' => '0335', 'producto' => '9',),
            '54' => array('numero' => '54', 'objeto' => 'Contratar Servicios del personal de apoyo a la Gestión con actividades de formación en arte, cultira y patimonio para el cumplimiento del proyecto 911-  Jornada educativa única para la excelencia académica y la formación integral', 'valor' => '127200000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('911')), 'fuente' => '01-12', 'concepto' => '0187', 'producto' => '9',),
            '0004-3' => array('numero' => '0004-3', 'objeto' => 'Contratar los servicios del personal de apoyo y de gestión para el cumplimiento del proyecto 498 Gestión e Intervención del Patrimonio Cultural Material del Distrito Capital', 'valor' => '35000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('498')), 'fuente' => '03-21', 'concepto' => '0108', 'producto' => '4',),
            '51' => array('numero' => '51', 'objeto' => 'Contratar personal para realizar la consolidación de información para administración, mantenimiento de los bienes de interes cultural enmarcados en el proyecto 498', 'valor' => '44380160', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('498')), 'fuente' => '03-21', 'concepto' => '0108', 'producto' => '4',),
            '50' => array('numero' => '50', 'objeto' => 'Contratar las actividades de avaluación y desarrollo de actividades de modernizació del inmueble ubicado en la calle 10  No. 4-45/51/55/65/79 de Bogotá', 'valor' => '14216000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('498')), 'fuente' => '03-21', 'concepto' => '0108', 'producto' => '4',),
            '31' => array('numero' => '31', 'objeto' => 'Contratar los servicios del personal de apoyo y de gestión para el cumplimiento del proyecto 746, circulación y divulgación de los valores del patrimonio cultural del Distrito Capital', 'valor' => '1028735000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('746')), 'fuente' => '01-12', 'concepto' => '0066', 'producto' => '5-6',),
            '014-10' => array('numero' => '014-10', 'objeto' => 'Contratar la asistencia técnica y apoyo para el desarrollo de las actividades asociadas a la conservación y protección de los elementos que constituye el patrimonio cultural mueble e inmueble ubicados en el espacio publico de la ciudad de Bogotá', 'valor' => '107561', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('746')), 'fuente' => '01-12', 'concepto' => '0109', 'producto' => '4',),
            '31' => array('numero' => '31', 'objeto' => 'Contratar los servicios de personal de apoyo a la gestion para el cumplimiento del proyecto 746 : Circulación y divulgación de los valores del patrimonio cultural', 'valor' => '200000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('746')), 'fuente' => '01-12', 'concepto' => '0185', 'producto' => '5',),
            '22' => array('numero' => '22', 'objeto' => 'Contratar los servicios de evaluación para las solicitudes de intervención para los inmuebles de interés cultural, sus colindantes y de los ubicados en sectores de interés cultural  del Distrito Capital, así como todas aquellas actividades de apoyo que se desprendan del proceso de evaluación de solicitudes', 'valor' => '500000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('440')), 'fuente' => '01-12', 'concepto' => '0316', 'producto' => '4',),
            '32' => array('numero' => '32', 'objeto' => 'Contratar Servicios de personal de apoyo y de Gestión para el cumplimiento del componente formulacion planes urbanos en SIC del proyecto de inversión 440 Revitalización del Centro Tradicional y de Sectores e Inmuebles de Interés Cultural Distrito Capital.', 'valor' => '750000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('440')), 'fuente' => '01-12', 'concepto' => '0185', 'producto' => '3',),
            '42' => array('numero' => '42', 'objeto' => 'Contratar Servicios del personal profesional y de apoyo ala gestión pra el cumplimiento de las acciones de intervención de bienes de interes cultural en el componente intervenciones del centro tradicional del proyexto 0440  Revitalización del Centro Tradicional y de Sectores e Inmuebles de Interés Cultural en el D.C.', 'valor' => '610044082', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('440')), 'fuente' => '01-12', 'concepto' => '0525', 'producto' => '4',),
            '49' => array('numero' => '49', 'objeto' => 'Contratar servicios profesionales y de apoyo a la gestión en el marco del proyecto 440 - Revitalización del Centro Tradicional y de Sectores e Inmuebles de Interés Cultural en el D.C.', 'valor' => '250000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('440')), 'fuente' => '01-12', 'concepto' => '0525', 'producto' => '4',),
            '0007-3' => array('numero' => '0007-3', 'objeto' => 'Contratar los servicios del personal de apoyo y de gestión para el cumplimiento del proyecto 942 Transparencia en la Gestión Institucional.', 'valor' => '25000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('942')), 'fuente' => '01-12', 'concepto' => '0020', 'producto' => '11',),
            '0008-3' => array('numero' => '0008-3', 'objeto' => 'Contratar los servicios del personal de apoyo y de gestión para el cumplimiento del proyecto 942 Transparencia en la Gestión Institucional.', 'valor' => '25000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('942')), 'fuente' => '01-12', 'concepto' => '0016', 'producto' => '11',),
            '0005-3' => array('numero' => '0005-3', 'objeto' => 'Contratar los servicios del personal de apoyo y de gestión para el cumplimiento del proyecto 733 Fortalecimiento y Mejoramiento de la Gestión Institucional.', 'valor' => '88000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('733')), 'fuente' => '01-12', 'concepto' => '0020', 'producto' => '10',),
            '37' => array('numero' => '37', 'objeto' => 'Contratar los servicios de apoyo y de gestión para el cumplimiento del proyecto 733- Fortalecimiento y mejoramiento de la gestión institucional', 'valor' => '195000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('733')), 'fuente' => '01-12', 'concepto' => '0020', 'producto' => '10',),
            '60' => array('numero' => '60', 'objeto' => 'Contratar lo sservicios para la planeación, analisis, diseño y programación e implementación de una aplicación tecnolígica, en la que el ODPC identifique y controle los bienes inmuebles que sean de interes cultural, con el fin de fortalecer y mejorar la gestión institucional.', 'valor' => '100000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('733')), 'fuente' => '01-12', 'concepto' => '0152', 'producto' => '10',),
            '35' => array('numero' => '35', 'objeto' => 'Contratar los servicios de los abogados externos de la Entidad', 'valor' => '70000000', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('7')), 'fuente' => 'Funcionamiento', 'concepto' => 'honorarios', 'producto' => '',),
            '46' => array('numero' => '46', 'objeto' => 'Contratar serv icios de mantenimiento preventivo y correctivo delos diferentes inmuebles, propiedad de la entidad', 'valor' => '16715776', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('7')), 'fuente' => 'Funcionamiento', 'concepto' => 'honorarios', 'producto' => '',),
            '47' => array('numero' => '47', 'objeto' => 'Contratar los servicios de mantenimeinto preventivo y correctivo de los jardines y zonas verdes de los diferentes inmuebles de propiedad de la entidad', 'valor' => '9305190', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('7')), 'fuente' => 'Funcionamiento', 'concepto' => 'honorarios', 'producto' => '',),
            '52' => array('numero' => '52', 'objeto' => 'Contratar los servicios profesionales con el fin de adelantar actividades referentes a la segunda convocatoria de empleos temporales del IDPC en conjunto con el DASCD', 'valor' => '8601600', 'fecha' => new \DateTime('2014-02-01'), 'oficio' => '', 'proyecto' => $manager->merge($this->getReference('7')), 'fuente' => 'Funcionamiento', 'concepto' => 'honorarios', 'producto' => '',),
        
            );
        foreach ($cdps as $referencia => $cdpname) {

            $cdp = new Cdp();
            foreach ($cdpname as $propiedad => $value) {
                $cdp->{'set' . ucfirst($propiedad)}($value);
            }
            $this->addReference($referencia, $cdp);
            $manager->persist($cdp);
        }
        $manager->flush();

        
        
    }

}

?>
