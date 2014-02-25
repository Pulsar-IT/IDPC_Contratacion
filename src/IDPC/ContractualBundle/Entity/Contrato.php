<?php

namespace IDPC\ContractualBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\ContractualBundle\Entity\Contrato
 *
 * @ORM\Table(name="tb_con_contrato")
 * @ORM\Entity(repositoryClass="IDPC\ContractualBundle\Entity\ContratoRepository")
 */

 class Contrato {
     
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
    
    protected $numero;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $fechaInicio;
    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $valorPrimerPago;
    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $valorPagoMensual;
    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $valorUltimoPago;


    


    


    
    
    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="contrato", cascade={"persist", "remove"})
     */
    Private $pagos;
    
    /**
     * @ORM\OneToOne(targetEntity="IDPC\SolicitudBundle\Entity\EstudioPrevio", mappedBy="contrato", cascade={"all"})
     * @ORM\JoinColumn(name="EstudioPrevio_id", referencedColumnName="id")
     */
    
    protected $estudio;
    
    /**
     * @ORM\ManyToOne(targetEntity="Security\SecurityBundle\Entity\UserDet", inversedBy="contratos")
     * @ORM\JoinColumn(name="Usuario_id", referencedColumnName="id")
     */
    
    protected $supervisor;


    


    
    
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
        $this->pagos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set numero
     *
     * @param string $numero
     * @return Contrato
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Contrato
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Contrato
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
     * @return Contrato
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
     * Add pagos
     *
     * @param \IDPC\ContractualBundle\Entity\Pago $pagos
     * @return Contrato
     */
    public function addPago(\IDPC\ContractualBundle\Entity\Pago $pagos)
    {
        $this->pagos[] = $pagos;

        return $this;
    }

    /**
     * Remove pagos
     *
     * @param \IDPC\ContractualBundle\Entity\Pago $pagos
     */
    public function removePago(\IDPC\ContractualBundle\Entity\Pago $pagos)
    {
        $this->pagos->removeElement($pagos);
    }

    /**
     * Get pagos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagos()
    {
        return $this->pagos;
    }

    /**
     * Set estudio
     *
     * @param \IDPC\SolicitudBundle\Entity\EstudioPrevio $estudio
     * @return Contrato
     */
    public function setEstudio(\IDPC\SolicitudBundle\Entity\EstudioPrevio $estudio = null)
    {
        $this->estudio = $estudio;

        return $this;
    }

    /**
     * Get estudio
     *
     * @return \IDPC\SolicitudBundle\Entity\EstudioPrevio
     */
    public function getEstudio()
    {
        return $this->estudio;
    }
    
    /**
     * Set valorPrimerPago
     *
     * @param integer $valorPrimerPago
     * @return Factura
     */
    public function setValorPrimerPago($valorPrimerPago)     {
        $this->valorPrimerPago = $valorPrimerPago;


        return $this;
    }

    /**
     * Get valorPrimerPago
     *
     * @return integer 
     */
    public function getValorPrimerPago()     {
        return $this->valorPrimerPago;
    }
    
    /**
     * Set valorPagoMensual
     *
     * @param integer $valorPagoMensual
     * @return Factura
     */
    public function setValorPagoMensual($valorPagoMensual)     {
        $this->valorPagoMensual = $valorPagoMensual;


        return $this;
    }

    /**
     * Get valorPagoMensual
     *
     * @return integer 
     */
    public function getValorPagoMensual()     {
        return $this->valorPagoMensual;
    }
    
    /**
     * Set valorUltimoPago
     *
     * @param integer $valorUltimoPago
     * @return Factura
     */
    public function setValorUltimoPago($valorUltimoPago)     {
        $this->valorUltimoPago = $valorUltimoPago;


        return $this;
    }

    /**
     * Get valorUltimoPago
     *
     * @return integer 
     */
    public function getValorUltimoPago()     {
        return $this->valorUltimoPago;
    }

    /**
     * Set supervisor
     *
     * @param \Security\SecurityBundle\Entity\UserDet $supervisor
     * @return Contrato
     */
    public function setUsuario(\Security\SecurityBundle\Entity\UserDet $supervisor = null)
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    /**
     * Get supervisor
     *
     * @return \Security\SecurityBundle\Entity\UserDet 
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }
}
