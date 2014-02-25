<?php

namespace IDPC\ContractualBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * IDPC\ContractualBundle\Entity\Aportes
 *
 * @ORM\Table(name="tb_con_aportes")
 * @ORM\Entity(repositoryClass="IDPC\ContractualBundle\Entity\AportesRepository")
 * @ORM\HasLifecycleCallbacks
 */

 class Aportes {
     
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
  
   protected $tipo;
   
    /**
     * @ORM\ManyToOne(targetEntity="Pago", inversedBy="aportes")
     * @ORM\JoinColumn(name="Pago_id", referencedColumnName="id")
     */
    
    protected $pago;
    
        /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $Referencia;
        
    
     /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $limite;
    
    
     /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $valor;
    
    
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length( max = "255" )
     */
    
    public $path;


    /**
     * @Assert\File(maxSize="6000000")
     */
    
    private $file;
 

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Aportes
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set Referencia
     *
     * @param string $referencia
     * @return Aportes
     */
    public function setReferencia($referencia)
    {
        $this->Referencia = $referencia;

        return $this;
    }

    /**
     * Get Referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->Referencia;
    }

    /**
     * Set limite
     *
     * @param integer $limite
     * @return Aportes
     */
    public function setLimite($limite)
    {
        $this->limite = $limite;

        return $this;
    }

    /**
     * Get limite
     *
     * @return integer 
     */
    public function getLimite()
    {
        return $this->limite;
    }

    /**
     * Set valor
     *
     * @param integer $valor
     * @return Aportes
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
     * Set path
     *
     * @param string $path
     * @return Aportes
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Aportes
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
     * @return Aportes
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
     * Set pago
     *
     * @param \IDPC\ContractualBundle\Entity\Pago $pago
     * @return Aportes
     */
    public function setPago(\IDPC\ContractualBundle\Entity\Pago $pago = null)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get pago
     *
     * @return \IDPC\ContractualBundle\Entity\Pago 
     */
    public function getPago()
    {
        return $this->pago;
    }
}
