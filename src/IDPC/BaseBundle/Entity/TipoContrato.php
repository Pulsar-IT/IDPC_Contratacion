<?php

namespace IDPC\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\BaseBundle\Entity\TipoContrato
 *
 * @ORM\Table(name="tb_bas_tipoContrato")
 * @ORM\Entity(repositoryClass="IDPC\BaseBundle\Entity\TipoContratoRepository")
 */

 class TipoContrato {
     
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
    
    protected $tipoContrato;
    
    /**
     * @ORM\OneToMany(targetEntity="IDPC\SolicitudBundle\Entity\EstudioPrevio", mappedBy="tipoContrato", cascade={"persist", "remove"})
     */
    Private $estudiosPrevios;

    

    
            


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
     * Set tipoContrato
     *
     * @param string $tipoContrato
     * @return TipoContrato
     */
    public function setTipoContrato($tipoContrato)
    {
        $this->tipoContrato = $tipoContrato;

        return $this;
    }

    /**
     * Get tipoContrato
     *
     * @return string 
     */
    public function getTipoContrato()
    {
        return $this->tipoContrato;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estudiosPrevios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add estudiosPrevios
     *
     * @param \IDPC\SolicitudBundle\Entity\EstudioPrevio $estudiosPrevios
     * @return TipoContrato
     */
    public function addEstudiosPrevio(\IDPC\SolicitudBundle\Entity\EstudioPrevio $estudiosPrevios)
    {
        $this->estudiosPrevios[] = $estudiosPrevios;

        return $this;
    }

    /**
     * Remove estudiosPrevios
     *
     * @param \IDPC\SolicitudBundle\Entity\EstudioPrevio $estudiosPrevios
     */
    public function removeEstudiosPrevio(\IDPC\SolicitudBundle\Entity\EstudioPrevio $estudiosPrevios)
    {
        $this->estudiosPrevios->removeElement($estudiosPrevios);
    }

    /**
     * Get estudiosPrevios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEstudiosPrevios()
    {
        return $this->estudiosPrevios;
    }
}
