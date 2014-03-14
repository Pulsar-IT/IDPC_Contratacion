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
     * @ORM\Column(type="integer")
     */
    
    protected $valor;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    
    protected $valorAportes;
    
    /**
     * @ORM\Column(type="integer")
     */
    
    protected $numeroPago;
    
    /**
     * @ORM\Column(type="smallint")
     */
    
    protected $estado;
    
    
    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    protected $fechaContratista;
    
    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    protected $fechaSupervisor;
    
    /**
     * @ORM\Column(type="datetime", options={"default"=null})
     * @Assert\DateTime()
     */
    protected $fechaTesoreria;
    
    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date()
     */
    protected $fechaInicio;

    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $diasPagados;
    
    
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
     * @ORM\OneToOne(targetEntity="Declaracion", mappedBy="pago", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    
    protected $declaracion;
    
     /**
     * @ORM\OneToOne(targetEntity="Certificacion", mappedBy="pago", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    
    protected $certificacion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Contrato", inversedBy="pagos")
     * @ORM\JoinColumn(name="Contrato_id", referencedColumnName="id")
     */
    
    protected $contrato;
    
    
     /**
     * @ORM\OneToMany(targetEntity="Aportes", mappedBy="pago", cascade={"persist", "remove"})
     */
    Private $aportes;

        
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

    /**
     * Set declaracion
     *
     * @param \IDPC\ContractualBundle\Entity\Declaracion $declaracion
     * @return Pago
     */
    public function setDeclaracion(\IDPC\ContractualBundle\Entity\Declaracion $declaracion = null)
    {
        $this->declaracion = $declaracion;

        return $this;
    }

    /**
     * Get declaracion
     *
     * @return \IDPC\ContractualBundle\Entity\Declaracion 
     */
    public function getDeclaracion()
    {
        return $this->declaracion;
    }

    /**
     * Set fechaContratista
     *
     * @param \DateTime $fechaContratista
     * @return Pago
     */
    public function setFechaContratista($fechaContratista)
    {
        $this->fechaContratista = $fechaContratista;

        return $this;
    }

    /**
     * Get fechaContratista
     *
     * @return \DateTime 
     */
    public function getFechaContratista()
    {
        return $this->fechaContratista;
    }

    /**
     * Set fechaSupervisor
     *
     * @param \DateTime $fechaSupervisor
     * @return Pago
     */
    public function setFechaSupervisor($fechaSupervisor)
    {
        $this->fechaSupervisor = $fechaSupervisor;

        return $this;
    }

    /**
     * Get fechaSupervisor
     *
     * @return \DateTime 
     */
    public function getFechaSupervisor()
    {
        return $this->fechaSupervisor;
    }

    /**
     * Set fechaTesoreria
     *
     * @param \DateTime $fechaTesoreria
     * @return Pago
     */
    public function setFechaTesoreria($fechaTesoreria)
    {
        $this->fechaTesoreria = $fechaTesoreria;

        return $this;
    }

    /**
     * Get fechaTesoreria
     *
     * @return \DateTime 
     */
    public function getFechaTesoreria()
    {
        return $this->fechaTesoreria;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Pago
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set diasPagados
     *
     * @param integer $diasPagados
     * @return Pago
     */
    public function setDiasPagados($diasPagados)
    {
        $this->diasPagados = $diasPagados;

        return $this;
    }

    /**
     * Get diasPagados
     *
     * @return integer 
     */
    public function getDiasPagados()
    {
        return $this->diasPagados;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Pago
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
     * @return Pago
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
     * Get aportes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAportes()
    {
        return $this->aportes;
    }

    /**
     * Add aportes
     *
     * @param \IDPC\ContractualBundle\Entity\Aportes $aportes
     * @return Pago
     */
    public function addAporte(\IDPC\ContractualBundle\Entity\Aportes $aportes)
    {
        $this->aportes[] = $aportes;

        return $this;
    }

    /**
     * Remove aportes
     *
     * @param \IDPC\ContractualBundle\Entity\Aportes $aportes
     */
    public function removeAporte(\IDPC\ContractualBundle\Entity\Aportes $aportes)
    {
        $this->aportes->removeElement($aportes);
    }

    /**
     * Set certificacion
     *
     * @param \IDPC\ContractualBundle\Entity\CErtificacion $certificacion
     * @return Pago
     */
    public function setCertificacion(\IDPC\ContractualBundle\Entity\CErtificacion $certificacion = null)
    {
        $this->certificacion = $certificacion;

        return $this;
    }

    /**
     * Get certificacion
     *
     * @return \IDPC\ContractualBundle\Entity\CErtificacion 
     */
    public function getCertificacion()
    {
        return $this->certificacion;
    }
}
