<?php

namespace IDPC\ContractualBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * IDPC\ContractualBundle\Entity\Certificacion
 *
 * @ORM\Table(name="tb_con_certificacion")
 * @ORM\Entity(repositoryClass="IDPC\ContractualBundle\Entity\CertificacionRepository")
 * @ORM\HasLifecycleCallbacks
 */

 class Certificacion{
     
     /**
     * @var integer $id
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     
    protected $id;


    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length( max = "10" )
     */
    
    protected $categoria;
    
    
     /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    
    protected $declararenta;
    
    /**
     * @ORM\OneToOne(targetEntity="Pago", inversedBy="certificacion")
     * @ORM\JoinColumn(name="Pago_id", referencedColumnName="id")
     * @Assert\Type(type="IDPC\ContractualBundle\Entity\Pago")
     */
    
    protected $pago;
    
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Certificacion
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
     * @return Certificacion
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
     * @return Certificacion
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
    
    public function getAbsolutePath() {
        return null === $this->path 
                ? null 
                : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path 
                ? null 
                : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        return 'uploads/certificaciones';
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)     {
        $this->file = $file;
        $this->nombre = 'Certificacion';

        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()     {
        return $this->file;
    }


    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()     {
        if (null !== $this->getFile()) {
            // haz lo que quieras para generar un nombre único
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename . '.' . $this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()     {
        if (null === $this->getFile()) {
            return;
        }

        // si hay un error al mover el archivo, move() automáticamente
        // envía una excepción. This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir() . '/' . $this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()     {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }



    /**
     * Set categoria
     *
     * @param string $categoria
     * @return Certificacion
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set declararenta
     *
     * @param \bool $declararenta
     * @return Certificacion
     */
    public function setDeclararenta(\bool $declararenta)
    {
        $this->declararenta = $declararenta;

        return $this;
    }

    /**
     * Get declararenta
     *
     * @return \bool 
     */
    public function getDeclararenta()
    {
        return $this->declararenta;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Certificacion
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
}
