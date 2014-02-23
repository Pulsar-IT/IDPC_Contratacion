<?php

namespace IDPC\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\BaseBundle\Entity\Area
 *
 * @ORM\Table(name="tb_bas_area")
 * @ORM\Entity(repositoryClass="IDPC\BaseBundle\Entity\AreaRepository")
 */

 class Area {
     
     /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     
    protected $id;


    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $nombre;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $sigla;
    
    /**
     * @ORM\OneToMany(targetEntity="Security\SecurityBundle\Entity\UserDet", mappedBy="area", cascade={"persist", "remove"})
     */
    Private $usuarios;

    

    


    
            


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Area
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set sigla
     *
     * @param string $sigla
     * @return Area
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;

        return $this;
    }

    /**
     * Get sigla
     *
     * @return string 
     */
    public function getSigla()
    {
        return $this->sigla;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add usuarios
     *
     * @param \Security\SecurityBundle\Entity\UserDet $usuarios
     * @return Area
     */
    public function addUsuario(\Security\SecurityBundle\Entity\UserDet $usuarios)
    {
        $this->usuarios[] = $usuarios;

        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \Security\SecurityBundle\Entity\UserDet $usuarios
     */
    public function removeUsuario(\Security\SecurityBundle\Entity\UserDet $usuarios)
    {
        $this->usuarios->removeElement($usuarios);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}
