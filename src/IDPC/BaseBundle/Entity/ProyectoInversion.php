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
    
    protected $descipcion;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
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
     * Constructor
     */
    public function __construct()
    {
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
     * Set descipcion
     *
     * @param string $descipcion
     * @return ProyectoInversion
     */
    public function setDescipcion($descipcion)
    {
        $this->descipcion = $descipcion;

        return $this;
    }

    /**
     * Get descipcion
     *
     * @return string 
     */
    public function getDescipcion()
    {
        return $this->descipcion;
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
}
