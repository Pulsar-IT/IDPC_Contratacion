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
     * @ORM\Column(type="date")
     * @Assert\Date()
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
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    
    protected $valorAportes;


    
    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $numeroPago;
    
    /**
     * @ORM\Column(type="smallint")
     */
    
    protected $estado;


    
    
    /**
     * @ORM\OneToOne(targetEntity="Cumplimiento", mappedBy="pago")
     * @ORM\JoinColumn(name="Cumplimiento_id", referencedColumnName="id")
     */
    
    protected $cumplimiento;
    
    
    /**
     * @ORM\OneToOne(targetEntity="Informe", mappedBy="pago", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    
    protected $informe;

    
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
     * Set smallint
     *
     * @param smallint $estado
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
     * @return smallint 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set contrato
     *
     * @param \IDPC\ContractualBundle\Entity\Contrato $contrato
     * @return Pago
     */
    public function setContrato(\IDPC\ContractualBundle\Entity\Contrato $contrato = null)
    {
        $this->contrato = $contrato;

        return $this;
    }

    /**
     * Get contrato
     *
     * @return \IDPC\ContractualBundle\Entity\Contrato 
     */
    public function getContrato()
    {
        return $this->contrato;
    }
    
    /**
     * Set valorAportes
     *
     * @param integer $valorAportes
     * @return Factura
     */
    public function setValorAportes($valorAportes)     {
        $this->valorAportes = $valorAportes;


        return $this;
    }

    /**
     * Get valorAportes
     *
     * @return integer 
     */
    public function getValorAportes()     {
        return $this->valorAportes;
    }


    /**
     * Set cumplimiento
     *
     * @param \IDPC\ContractualBundle\Entity\Cumplimiento $cumplimiento
     * @return Pago
     */
    public function setCumplimiento(\IDPC\ContractualBundle\Entity\Cumplimiento $cumplimiento = null)
    {
        $this->cumplimiento = $cumplimiento;

        return $this;
    }

    /**
     * Get cumplimiento
     *
     * @return \IDPC\ContractualBundle\Entity\Cumplimiento 
     */
    public function getCumplimiento()
    {
        return $this->cumplimiento;
    }

    /**
     * Set informe
     *
     * @param \IDPC\ContractualBundle\Entity\Informe $informe
     * @return Pago
     */
    public function setInforme(\IDPC\ContractualBundle\Entity\Informe $informe = null)
    {
        $this->informe = $informe;

        return $this;
    }

    /**
     * Get informe
     *
     * @return \IDPC\ContractualBundle\Entity\Informe 
     */
    public function getInforme()
    {
        return $this->informe;
    }
}
