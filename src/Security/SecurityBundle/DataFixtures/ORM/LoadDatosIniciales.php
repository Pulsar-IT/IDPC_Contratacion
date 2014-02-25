<?php

namespace Security\SecurityBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

//Entidades

use Security\SecurityBundle\Entity\Role;
use Security\SecurityBundle\Entity\User;

class LoadDatosIniciales extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    protected $manager;
    private $container;
    
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function generatePassword($password) {
        $this->salt = md5(time());
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $this->password = $encoder->encodePassword($password, $this->getSalt());
    }
    
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        // -- Cargar datos de USUARIOS ----------------------------------------
        $factory = $this->container->get('security.encoder_factory');
        
        $roles = array(
            'system' => array(
                'name' => 'ROLE_SYSTEM',
                'descripcion' => 'Administrador total del sistema'
            ),
            'admin' => array(
                'name' => 'ROLE_ADMIN',
                'descripcion' => 'Administrador del sistema'
            ),
            'supervisor' => array(
                'name' => 'ROLE_SUPERVISOR',
                'descripcion' => 'Supervisor de contratos'
            ),
            
        );
        
        foreach ($roles as $referencia => $rolName) {
            
            $rol =new Role();
            
            foreach ($rolName as $propiedad => $value) {
                $rol->{'set'.ucfirst($propiedad)}($value);
            }
            
            $this->addReference($referencia, $rol);
            $manager->persist($rol);
            
        }
        
        $manager->flush();
        
        
        
        $usuarios = array(
            'SystemAdmin' => array(
                'username' => 'SystemAdmin',
                'email' => 'systemadmin@loc.loc',
                'userRoles' => array($manager->merge($this->getReference('system'))),
                'password' => 'systemadmin'
            ),
            'Admin' => array(
                'username' => 'Admin',
                'email' => 'admin@loc.loc',
                'userRoles' => array($manager->merge($this->getReference('admin'))),
                'password' => 'admin'
            )
        );
        
        $usuario = new User();
        
        $usuario->setUsername('SystemAdmin');
        $usuario->setEmail('SystemAdmin@pulsar.it');
        $usuario->setPassword('uSqI5HwQq78pKYPwLqxs2eVNScLVC3AUEvGaxmRXk9tGul33HfHw+NuYTkFkyjmXeIkk+KdjIslcxJvAh08hiw==');
        //Password: admin
        $usuario->setSalt('cbe059ab2857a64b7ca4cf71f43a01b7');
        $usuario->setUserRoles(array($manager->merge($this->getReference('system'))));
        $manager->persist($usuario);

        
        $manager->flush();
        
        
        
        
    }
    
        public function getOrder()
    {
        return 1;
    }
    
    
}


?>
