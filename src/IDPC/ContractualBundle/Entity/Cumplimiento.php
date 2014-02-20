<?php

namespace IDPC\ContractualBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\ContractualBundle\Entity\Cumplimiento
 *
 * @ORM\Table(name="tb_con_cumplimiento")
 * @ORM\Entity(repositoryClass="IDPC\ContractualBundle\Entity\CumplimientoRepository")
 */

 class Cumplimiento {
     
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
    
    protected $planilla;
    
    /**
     * @ORM\ManyToOne(targetEntity="Pago", inversedBy="cumplimientos")
     * @ORM\JoinColumn(name="Pago_id", referencedColumnName="id")
     */
    
    protected $pago;
    
    
    
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
     * Set planilla
     *
     * @param string $planilla
     * @return Cumplimiento
     */
    public function setPlanilla($planilla)
    {
        $this->planilla = $planilla;

        return $this;
    }

    /**
     * Get planilla
     *
     * @return string 
     */
    public function getPlanilla()
    {
        return $this->planilla;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Cumplimiento
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
     * @return Cumplimiento
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
     * @return Cumplimiento
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
