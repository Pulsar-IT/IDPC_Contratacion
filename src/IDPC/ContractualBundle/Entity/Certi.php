<?php
namespace IDPC\ContractualBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * IDPC\ContractualBundle\Entity\Certi
 */
class Certi{
   
    /**
     * @Assert\NotBlank()
     */
    protected $id; 
    
    /**
     * @Assert\NotBlank()
     */
    protected $categoria;
    
    
     /**
     * @Assert\NotBlank()
     */
    protected $declarante;

    
     /**
     * Set id
     *
     * @param integer $id
     * @return Certi
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set categoria
     * @param string $categoria
     * @return Categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    
    
      /**
     * Set declarante
     * @param string $declarante
     * @return Declarante
     */
    public function setDeclarante($declarante)
    {
        $this->declarante = $declarante;

        return $this;
    }

    /**
     * Get declarante
     * @return string 
     */
    public function getDeclarante()
    {
        return $this->declarante;
    }
    
}
