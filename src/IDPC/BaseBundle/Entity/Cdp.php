<?php

namespace IDPC\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * IDPC\BaseBundle\Entity\Cdp
 *
 * @ORM\Table(name="tb_bas_cdp")
 * @ORM\Entity(repositoryClass="IDPC\BaseBundle\Entity\CdpRepository")
 */

 class Cdp {
     
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
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    
    protected $objeto;


    
    /**
     *
     * @ORM\Column(type="integer")
     * 
     */
    
    protected $valor;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $fecha;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $oficio;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProyectoInversion", inversedBy="cdp")
     * @ORM\JoinColumn(name="ProyectoInversion_id", referencedColumnName="id")
     */
    
    protected $proyecto;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $fuente;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $concepto;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $producto;


    


    


    
    
    /**
     * @ORM\Column(type="string", nullable=true)
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
     * Set numero
     *
     * @param string $numero
     * @return Cdp
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
     * Set objeto
     *
     * @param string $objeto
     * @return Cdp
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
     * Set valor
     *
     * @param integer $valor
     * @return Cdp
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Cdp
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set oficio
     *
     * @param string $oficio
     * @return Cdp
     */
    public function setOficio($oficio)
    {
        $this->oficio = $oficio;

        return $this;
    }

    /**
     * Get oficio
     *
     * @return string 
     */
    public function getOficio()
    {
        return $this->oficio;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Cdp
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
     * @return Cdp
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
     * Set proyecto
     *
     * @param \IDPC\BaseBundle\Entity\ProyectoInversion $proyecto
     * @return Cdp
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
        return 'uploads/documents';
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)     {
        $this->file = $file;


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
     * Set fuente
     *
     * @param string $fuente
     * @return Factura
     */
    public function setFuente($fuente)     {
        $this->fuente = $fuente;


        return $this;
    }

    /**
     * Get fuente
     *
     * @return string 
     */
    public function getFuente()     {
        return $this->fuente;
    }
    
    /**
     * Set concepto
     *
     * @param string $concepto
     * @return Factura
     */
    public function setConcepto($concepto)     {
        $this->concepto = $concepto;


        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()     {
        return $this->concepto;
    }
    
    /**
     * Set producto
     *
     * @param string $producto
     * @return Factura
     */
    public function setProducto($producto)     {
        $this->producto = $producto;


        return $this;
    }

    /**
     * Get producto
     *
     * @return string 
     */
    public function getProducto()     {
        return $this->producto;
    }


}
