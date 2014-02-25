<?php

namespace IDPC\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\BaseBundle\Entity\ProyectoInversion
 *
 * @ORM\Table(name="tb_bas_proyectoInversion")
 * @ORM\Entity(repositoryClass="IDPC\BaseBundle\Entity\ProyectoInversionRepository")
 */

 class ProyectoInversion {
     
     /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
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
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length( max = "100" )
     */
    
    protected $vigencia;
    
    /**
     * @ORM\OneToMany(targetEntity="Cdp", mappedBy="proyecto", cascade={"persist", "remove"})
     */
    Private $cdp;
    
    /**
     * @ORM\OneToMany(targetEntity="Pmr", mappedBy="proyecto", cascade={"persist", "remove"})
     */
    Private $pmrs;
    
    /**
     * @ORM\OneToMany(targetEntity="IDPC\SolicitudBundle\Entity\Noplanta", mappedBy="proyectoinversion", cascade={"persist", "remove"})
     */
    Private $noplanta;

    
    



    


    


    
            

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cdp = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Set id
     *
     * @param integer $id
     * @return ProyectoInversion
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * @param string $vigencia
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
     * @return string 
     */
    public function getVigencia()
    {
        return $this->vigencia;
    }

    /**
     * Add cdp
     *
     * @param \IDPC\BaseBundle\Entity\Cdp $cdp
     * @return ProyectoInversion
     */
    public function addCdp(\IDPC\BaseBundle\Entity\Cdp $cdp)
    {
        $this->cdp[] = $cdp;

        return $this;
    }

    /**
     * Remove cdp
     *
     * @param \IDPC\BaseBundle\Entity\Cdp $cdp
     */
    public function removeCdp(\IDPC\BaseBundle\Entity\Cdp $cdp)
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

    /**
     * Add pmrs
     *
     * @param \IDPC\BaseBundle\Entity\Pmr $pmrs
     * @return ProyectoInversion
     */
    public function addPmr(\IDPC\BaseBundle\Entity\Pmr $pmrs)
    {
        $this->pmrs[] = $pmrs;

        return $this;
    }

    /**
     * Remove pmrs
     *
     * @param \IDPC\BaseBundle\Entity\Pmr $pmrs
     */
    public function removePmr(\IDPC\BaseBundle\Entity\Pmr $pmrs)
    {
        $this->pmrs->removeElement($pmrs);
    }

    /**
     * Get pmrs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPmrs()
    {
        return $this->pmrs;
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
}
