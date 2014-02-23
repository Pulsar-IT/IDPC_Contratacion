<?php

namespace IDPC\SolicitudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\SolicitudBundle\Entity\EstudiosPrevios
 *
 * @ORM\Table(name="tb_sol_estudios")
 * @ORM\Entity(repositoryClass="IDPC\SolicitudBundle\Entity\EstudiosPreviosRepository")
 */

 class EstudiosPrevios {
     
     /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     
    protected $id;


    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    
    protected $objeto;
    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $valorContrato;
    
    /**
     *
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 12,
     *      minMessage = "El numero de mes no puede ser menor a 0",
     *      maxMessage = "El numero de mes no puede ser mayor a 12"
     * )
     */
    
    protected $plazoMeses;
    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $plazoDias;
    
    /**
     * @ORM\OneToOne(targetEntity="IDPC\ContractualBundle\Entity\Contrato", mappedBy="estudio", cascade={"all"})
     * @ORM\JoinColumn(name="Contrato_id", referencedColumnName="id")
     */
    
    protected $contrato;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $tipoContrato;


    


    
    
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
     * Set objeto
     *
     * @param string $objeto
     * @return EstudiosPrevios
     */
    public function setObjeto($objeto)
    {
        $this->objeto = $objeto;

        return $this;
    }

    /**
     * Get objeto
     *
     * @return string 
     */
    public function getObjeto()
    {
        return $this->objeto;
    }

    /**
     * Set valorContrato
     *
     * @param integer $valorContrato
     * @return EstudiosPrevios
     */
    public function setValorContrato($valorContrato)
    {
        $this->valorContrato = $valorContrato;

        return $this;
    }

    /**
     * Get valorContrato
     *
     * @return integer 
     */
    public function getValorContrato()
    {
        return $this->valorContrato;
    }

    /**
     * Set plazoMeses
     *
     * @param integer $plazoMeses
     * @return EstudiosPrevios
     */
    public function setPlazoMeses($plazoMeses)
    {
        $this->plazoMeses = $plazoMeses;

        return $this;
    }

    /**
     * Get plazoMeses
     *
     * @return integer 
     */
    public function getPlazoMeses()
    {
        return $this->plazoMeses;
    }

    /**
     * Set plazoDias
     *
     * @param integer $plazoDias
     * @return EstudiosPrevios
     */
    public function setPlazoDias($plazoDias)
    {
        $this->plazoDias = $plazoDias;

        return $this;
    }

    /**
     * Get plazoDias
     *
     * @return integer 
     */
    public function getPlazoDias()
    {
        return $this->plazoDias;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return EstudiosPrevios
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
     * @return EstudiosPrevios
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
     * Set contrato
     *
     * @param \IDPC\ContractualBundle\Entity\Contrato $contrato
     * @return EstudiosPrevios
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
     * Set tipoContrato
     *
     * @param string $tipoContrato
     * @return Factura
     */
    public function setTipoContrato($tipoContrato)     {
        $this->tipoContrato = $tipoContrato;


        return $this;
    }

    /**
     * Get tipoContrato
     *
     * @return string 
     */
    public function getTipoContrato()     {
        return $this->tipoContrato;
    }
}
