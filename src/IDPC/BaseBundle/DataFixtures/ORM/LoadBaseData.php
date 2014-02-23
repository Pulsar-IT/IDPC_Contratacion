<?php

namespace IDPC\BaseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IDPC\BaseBundle\Entity\Area;
use IDPC\BaseBundle\Entity\TipoContrato;

class LoadBaseData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tiposontrato = new TipoContrato();
        
        $tiposontrato->setTipoContrato('Prestacion de Servicios Profesionales');
        $tiposontrato->setTipoContrato('Prestación de Servicios de Apoyo a la Gestión');
        
        $manager->persist($tiposontrato);
        $manager->flush();
    }
}

?>
