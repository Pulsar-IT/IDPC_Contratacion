<?php

namespace IDPC\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\BaseBundle\Entity\Pmr
 *
 * @ORM\Table(name="tb_bas_pmr")
 * @ORM\Entity(repositoryClass="IDPC\BaseBundle\Entity\PmrRepository")
 */

 class Pmr {
     
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
    
    protected $titulo;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    
    protected $descripcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProyectoInversion", inversedBy="pmrs")
     * @ORM\JoinColumn(name="ProyectoInversion_id", referencedColumnName="id")
     */
    
    protected $proyecto;


    


    


    
            


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
     * Set titulo
     *
     * @param string $titulo
     * @return Pmr
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Pmr
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
     * Set proyecto
     *
     * @param \IDPC\BaseBundle\Entity\ProyectoInversion $proyecto
     * @return Pmr
     */
    public function setProyecto(\IDPC\BaseBundle\Entity\ProyectoInversion $proyecto = null)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \IDPC\BaseBundle\Entity\ProyectoInversion 
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }
}
