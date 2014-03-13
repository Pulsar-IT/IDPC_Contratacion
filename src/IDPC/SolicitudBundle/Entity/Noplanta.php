<?php

namespace IDPC\SolicitudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\SolicitudBundle\Entity\Noplanta
 *
 * @ORM\Table(name="tb_sol_noplanta")
 * @ORM\Entity(repositoryClass="IDPC\SolicitudBundle\Entity\NoplantaRepository")
 */

 class Noplanta {
     
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
    
    protected $usuario;
    
    /**
     * @var datetime $created
     * 
     * @ORM\Column( type="datetime")
     * @Gedmo\Timestampable(on="create")
     * 
     */
    
    private $created_at;

    
    /**
     * @var datetime $updated
     * 
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    
    private $update_at;
    
    /**
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="noplanta")
     * @ORM\JoinColumn(name="Solicitud_id", referencedColumnName="id")
     */
    
    protected $solicitud;
    
    /**
     * @ORM\ManyToOne(targetEntity="IDPC\BaseBundle\Entity\ProyectoInversion", inversedBy="noplanta")
     * @ORM\JoinColumn(name="ProyectoInversion_id", referencedColumnName="id")
     */
    
    protected $proyectoinversion;
    
    

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
     * Set usuario
     *
     * @param string $usuario
     * @return Noplanta
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Noplanta
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set update_at
     *
     * @param \DateTime $updateAt
     * @return Noplanta
     */
    public function setUpdateAt($updateAt)
    {
        $this->update_at = $updateAt;

        return $this;
    }

    /**
     * Get update_at
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * Set solicitud
     *
     * @param \IDPC\SolicitudBundle\Entity\Solicitud $solicitud
     * @return Noplanta
     */
    public function setSolicitud(\IDPC\SolicitudBundle\Entity\Solicitud $solicitud = null)
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    /**
     * Get solicitud
     *
     * @return \IDPC\SolicitudBundle\Entity\Solicitud 
     */
    public function getSolicitud()
    {
        return $this->solicitud;
    }

    /**
     * Set proyectoinversion
     *
     * @param \IDPC\BaseBundle\Entity\ProyectoInversion $proyectoinversion
     * @return Noplanta
     */
    public function setProyectoinversion(\IDPC\BaseBundle\Entity\ProyectoInversion $proyectoinversion = null)
    {
        $this->proyectoinversion = $proyectoinversion;

        return $this;
    }

    /**
     * Get proyectoinversion
     *
     * @return \IDPC\BaseBundle\Entity\ProyectoInversion 
     */
    public function getProyectoinversion()
    {
        return $this->proyectoinversion;
    }
}
