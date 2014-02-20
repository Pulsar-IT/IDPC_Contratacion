<?php

namespace IDPC\ContractualBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\ContractualBundle\Entity\Pago
 *
 * @ORM\Table(name="tb_con_pago")
 * @ORM\Entity(repositoryClass="IDPC\ContractualBundle\Entity\PagoRepository")
 */

 class Pago {
     
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
    
    protected $mes;
    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $valor;
    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $numeroPago;
    
    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    
    protected $estado;


    
    
    /**
     * @ORM\OneToMany(targetEntity="Cumplimiento", mappedBy="pago", cascade={"persist", "remove"})
     */
    Private $cumplimientos;
    
    /**
     * @ORM\OneToMany(targetEntity="Informe", mappedBy="pago", cascade={"persist", "remove"})
     */
    Private $informes;
    
    /**
     * @ORM\ManyToOne(targetEntity="Contrato", inversedBy="pagos")
     * @ORM\JoinColumn(name="Contrato_id", referencedColumnName="id")
     */
    
    protected $contrato;


    






    
    
    


    


    


    
            

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cumplimientos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->informes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set mes
     *
     * @param string $mes
     * @return Pago
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return string 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set valor
     *
     * @param integer $valor
     * @return Pago
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
     * Set numeroPago
     *
     * @param integer $numeroPago
     * @return Pago
     */
    public function setNumeroPago($numeroPago)
    {
        $this->numeroPago = $numeroPago;

        return $this;
    }

    /**
     * Get numeroPago
     *
     * @return integer 
     */
    public function getNumeroPago()
    {
        return $this->numeroPago;
    }

    /**
     * Add cumplimientos
     *
     * @param \IDPC\ContractualBundle\Entity\Cumplimiento $cumplimientos
     * @return Pago
     */
    public function addCumplimiento(\IDPC\ContractualBundle\Entity\Cumplimiento $cumplimientos)
    {
        $this->cumplimientos[] = $cumplimientos;

        return $this;
    }

    /**
     * Remove cumplimientos
     *
     * @param \IDPC\ContractualBundle\Entity\Cumplimiento $cumplimientos
     */
    public function removeCumplimiento(\IDPC\ContractualBundle\Entity\Cumplimiento $cumplimientos)
    {
        $this->cumplimientos->removeElement($cumplimientos);
    }

    /**
     * Get cumplimientos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCumplimientos()
    {
        return $this->cumplimientos;
    }

    /**
     * Add informes
     *
     * @param \IDPC\ContractualBundle\Entity\Informe $informes
     * @return Pago
     */
    public function addInforme(\IDPC\ContractualBundle\Entity\Informe $informes)
    {
        $this->informes[] = $informes;

        return $this;
    }

    /**
     * Remove informes
     *
     * @param \IDPC\ContractualBundle\Entity\Informe $informes
     */
    public function removeInforme(\IDPC\ContractualBundle\Entity\Informe $informes)
    {
        $this->informes->removeElement($informes);
    }

    /**
     * Get informes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInformes()
    {
        return $this->informes;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Pago
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
