<?php

namespace IDPC\SolicitudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\SolicitudBundle\Entity\Solicitud
 *
 * @ORM\Table(name="tb_sol_solicitud")
 * @ORM\Entity(repositoryClass="IDPC\SolicitudBundle\Entity\SolicitudRepository")
 */

 class Solicitud {
     
     /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     
    protected $id;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $fechaCierre;
    
    /**
     * @ORM\Column(type="integer")
     */
    
    protected $estadoSolicitud;
    
    /**
     * @ORM\Column(type="integer")
     */
    
    protected $estadoProceso;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    
    protected $observaciones;
    
    /**
     * @ORM\ManyToOne(targetEntity="IDPC\BaseBundle\Entity\Area", inversedBy="solicitudes")
     * @ORM\JoinColumn(name="Area_id", referencedColumnName="id")
     */
    
    protected $area;


    
    
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
     * @ORM\OneToMany(targetEntity="Noplanta", mappedBy="solicitud", cascade={"persist", "remove"})
     */
    Private $noplanta;


    




    
    
    
    
    


    


    


    


    


    
            

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->noplanta = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fechaCierre
     *
     * @param \DateTime $fechaCierre
     * @return Solicitud
     */
    public function setFechaCierre($fechaCierre)
    {
        $this->fechaCierre = $fechaCierre;

        return $this;
    }

    /**
     * Get fechaCierre
     *
     * @return \DateTime 
     */
    public function getFechaCierre()
    {
        return $this->fechaCierre;
    }

    /**
     * Set estadoSolicitud
     *
     * @param integer $estadoSolicitud
     * @return Solicitud
     */
    public function setEstadoSolicitud($estadoSolicitud)
    {
        $this->estadoSolicitud = $estadoSolicitud;

        return $this;
    }

    /**
     * Get estadoSolicitud
     *
     * @return integer 
     */
    public function getEstadoSolicitud()
    {
        return $this->estadoSolicitud;
    }

    /**
     * Set estadoProceso
     *
     * @param integer $estadoProceso
     * @return Solicitud
     */
    public function setEstadoProceso($estadoProceso)
    {
        $this->estadoProceso = $estadoProceso;

        return $this;
    }

    /**
     * Get estadoProceso
     *
     * @return integer 
     */
    public function getEstadoProceso()
    {
        return $this->estadoProceso;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Solicitud
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Solicitud
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
     * @return Solicitud
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
     * Add noplanta
     *
     * @param \IDPC\SolicitudBundle\Entity\Noplanta $noplanta
     * @return Solicitud
     */
    public function addNoplantum(\IDPC\SolicitudBundle\Entity\Noplanta $noplanta)
    {
        $this->noplanta[] = $noplanta;

        return $this;
    }

    /**
     * Remove noplanta
     *
     * @param \IDPC\SolicitudBundle\Entity\Noplanta $noplanta
     */
    public function removeNoplantum(\IDPC\SolicitudBundle\Entity\Noplanta $noplanta)
    {
        $this->noplanta->removeElement($noplanta);
    }

    /**
     * Get noplanta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNoplanta()
    {
        return $this->noplanta;
    }
    /**
     * Set area
     *
     * @param \IDPC\BaseBundle\Entity\Area $area
     * @return Solicitud
     */
    public function setArea(\IDPC\BaseBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \IDPC\BaseBundle\Entity\Area 
     */
    public function getArea()
    {
        return $this->area;
    }
}
