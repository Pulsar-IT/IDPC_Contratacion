<?php

namespace Meissen\SecurityBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Meissen\SecurityBundle\Entity\Role
 * 
 * @ORM\Entity()
 * @ORM\Table(name="admin_roles")
 */
class Role implements RoleInterface, \Serializable {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="nombre", type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "50")
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "255" )
     */
    
    protected $descripcion;


    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * Set descripcion
     * 
     * @param string $descripcion
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    /**
     * Get descripcion
     * 
     * @return string
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getRole() {
        return $this->getName();
    }

    public function __toString() {
        return $this->getRole();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        /*
         * ! Don't serialize $users field !
         */
        return \serialize(array(
                    $this->id,
                    $this->name
                ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list(
                $this->id,
                $this->name
                ) = \unserialize($serialized);
    }

}