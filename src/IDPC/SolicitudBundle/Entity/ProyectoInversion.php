<?php

namespace IDPC\SolicitudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\olicitudBundle\Entity\ProyectoInversion
 *
 * @ORM\Table(name="tb_sol_proyectoinversion")
 * @ORM\Entity(repositoryClass="IDPC\olicitudBundle\Entity\ProyectoInversionRepository")
 */

 class ProyectoInversion {
     
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
    
    protected $codigo;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $descripcion;
    
    /**
     * @ORM\Column(type="integer")
     */
    
    protected $vigencia;
    
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
     * @ORM\OneToMany(targetEntity="Noplanta", mappedBy="proyectoinversion", cascade={"persist", "remove"})
     */
    Private $noplanta;
    
    /**
     * @ORM\OneToMany(targetEntity="Cdp", mappedBy="proyectoinversion", cascade={"persist", "remove"})
     */
    Private $cdp;






    


    


    
            

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->noplanta = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cdp = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set codigo
     *
     * @param string $codigo
     * @return ProyectoInversion
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ProyectoInversion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set vigencia
     *
     * @param integer $vigencia
     * @return ProyectoInversion
     */
    public function setVigencia($vigencia)
    {
        $this->vigencia = $vigencia;

        return $this;
    }

    /**
     * Get vigencia
     *
     * @return integer 
     */
    public function getVigencia()
    {
        return $this->vigencia;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return ProyectoInversion
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
     * @return ProyectoInversion
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
     * @return ProyectoInversion
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
     * Add cdp
     *
     * @param \IDPC\SolicitudBundle\Entity\Cdp $cdp
     * @return ProyectoInversion
     */
    public function addCdp(\IDPC\SolicitudBundle\Entity\Cdp $cdp)
    {
        $this->cdp[] = $cdp;

        return $this;
    }

    /**
     * Remove cdp
     *
     * @param \IDPC\SolicitudBundle\Entity\Cdp $cdp
     */
    public function removeCdp(\IDPC\SolicitudBundle\Entity\Cdp $cdp)
    {
        $this->cdp->removeElement($cdp);
    }

    /**
     * Get cdp
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCdp()
    {
        return $this->cdp;
    }
}
