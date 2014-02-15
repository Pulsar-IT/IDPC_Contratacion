<?php

namespace IDPC\SolicitudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\SolicitudBundle\Entity\Cdp
 *
 * @ORM\Table(name="tb_sol_CDP")
 * @ORM\Entity(repositoryClass="IDPC\SolicitudBundle\Entity\CdpRepository")
 */

 class Cdp {
     
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
    
    protected $objeto;
    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $valor;
    
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
     * @ORM\ManyToOne(targetEntity="ProyectoInversion", inversedBy="cdp")
     * @ORM\JoinColumn(name="ProyectoInversion_id", referencedColumnName="id")
     */
    
    protected $proyectoinversion;
    
    /**
     * @ORM\OneToMany(targetEntity="Solicitud", mappedBy="cdp", cascade={"persist", "remove"})
     */
    Private $solicitudes;




    


    


    
            

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->solicitudes = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set objeto
     *
     * @param string $objeto
     * @return Cdp
     */
    public function setObjeto($objeto)
    {
        $this->objeto = $objeto;

        return $this;
    }

    /**
     * Get objeto
     *
     * @return string 
     */
    public function getObjeto()
    {
        return $this->objeto;
    }

    /**
     * Set valor
     *
     * @param integer $valor
     * @return Cdp
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return integer 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Cdp
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
     * @return Cdp
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
     * Set proyectoinversion
     *
     * @param \IDPC\SolicitudBundle\Entity\ProyectoInversion $proyectoinversion
     * @return Cdp
     */
    public function setProyectoinversion(\IDPC\SolicitudBundle\Entity\ProyectoInversion $proyectoinversion = null)
    {
        $this->proyectoinversion = $proyectoinversion;

        return $this;
    }

    /**
     * Get proyectoinversion
     *
     * @return \IDPC\SolicitudBundle\Entity\ProyectoInversion 
     */
    public function getProyectoinversion()
    {
        return $this->proyectoinversion;
    }

    /**
     * Add solicitudes
     *
     * @param \IDPC\SolicitudBundle\Entity\Solicitud $solicitudes
     * @return Cdp
     */
    public function addSolicitude(\IDPC\SolicitudBundle\Entity\Solicitud $solicitudes)
    {
        $this->solicitudes[] = $solicitudes;

        return $this;
    }

    /**
     * Remove solicitudes
     *
     * @param \IDPC\SolicitudBundle\Entity\Solicitud $solicitudes
     */
    public function removeSolicitude(\IDPC\SolicitudBundle\Entity\Solicitud $solicitudes)
    {
        $this->solicitudes->removeElement($solicitudes);
    }

    /**
     * Get solicitudes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSolicitudes()
    {
        return $this->solicitudes;
    }
}
