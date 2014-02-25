<?php

namespace Security\SecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Security\SecurityBundle\Entity\UserDet
 *
 * @ORM\Table(name="admin_user_details")
 * @ORM\Entity(repositoryClass="Security\SecurityBundle\Entity\UserDetRepository")
 */

 class UserDet {

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
    
    protected $tipoDocumento;
    
    /**
     * @ORM\Column(type="integer", unique=true)
     * @Assert\NotBlank()
     */
    
    protected $documento;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    protected $expedicionLugar;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $expedicionDate;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $primerNombre;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $segundoNombre;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $primerApellido;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $segundoApellido;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $genero;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $fechaNacimiento;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $direccionResidencia;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $telefonoFijo;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( max = "100" )
     */
    
    protected $telefonoMovil;


    
    
    
    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="userdet")
     * @ORM\JoinColumn(name="User_id", referencedColumnName="id")
     */
    
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="IDPC\BaseBundle\Entity\Area", inversedBy="usuarios")
     * @ORM\JoinColumn(name="Area_id", referencedColumnName="id")
     */
    
    protected $area;


    /**
     * @ORM\OneToMany(targetEntity="IDPC\SolicitudBundle\Entity\EstudioPrevio", mappedBy="supervisor", cascade={"persist", "remove"})
     */
    Private $estudiosPrevios;

    

    

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
     * Set tipoDocumento
     *
     * @param string $tipoDocumento
     * @return UserDet
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    
        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return string 
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set documento
     *
     * @param integer $documento
     * @return UserDet
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    
        return $this;
    }

    /**
     * Get documento
     *
     * @return integer 
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set expedicionLugar
     *
     * @param \DateTime $expedicionLugar
     * @return UserDet
     */
    public function setExpedicionLugar($expedicionLugar)
    {
        $this->expedicionLugar = $expedicionLugar;
    
        return $this;
    }

    /**
     * Get expedicionLugar
     *
     * @return \DateTime 
     */
    public function getExpedicionLugar()
    {
        return $this->expedicionLugar;
    }

    /**
     * Set expedicionDate
     *
     * @param \DateTime $expedicionDate
     * @return UserDet
     */
    public function setExpedicionDate($expedicionDate)
    {
        $this->expedicionDate = $expedicionDate;
    
        return $this;
    }

    /**
     * Get expedicionDate
     *
     * @return \DateTime 
     */
    public function getExpedicionDate()
    {
        return $this->expedicionDate;
    }

    /**
     * Set primerNombre
     *
     * @param string $primerNombre
     * @return UserDet
     */
    public function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    
        return $this;
    }

    /**
     * Get primerNombre
     *
     * @return string 
     */
    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    /**
     * Set segundoNombre
     *
     * @param string $segundoNombre
     * @return UserDet
     */
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;
    
        return $this;
    }

    /**
     * Get segundoNombre
     *
     * @return string 
     */
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    /**
     * Set primerApellido
     *
     * @param string $primerApellido
     * @return UserDet
     */
    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;
    
        return $this;
    }

    /**
     * Get primerApellido
     *
     * @return string 
     */
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    /**
     * Set segundoApellido
     *
     * @param string $segundoApellido
     * @return UserDet
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    
        return $this;
    }

    /**
     * Get segundoApellido
     *
     * @return string 
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * Set genero
     *
     * @param string $genero
     * @return UserDet
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    
        return $this;
    }

    /**
     * Get genero
     *
     * @return string 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return UserDet
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    
        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set direccionResidencia
     *
     * @param string $direccionResidencia
     * @return UserDet
     */
    public function setDireccionResidencia($direccionResidencia)
    {
        $this->direccionResidencia = $direccionResidencia;
    
        return $this;
    }

    /**
     * Get direccionResidencia
     *
     * @return string 
     */
    public function getDireccionResidencia()
    {
        return $this->direccionResidencia;
    }

    /**
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     * @return UserDet
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;
    
        return $this;
    }

    /**
     * Get telefonoFijo
     *
     * @return string 
     */
    public function getTelefonoFijo()
    {
        return $this->telefonoFijo;
    }

    /**
     * Set telefonoMovil
     *
     * @param string $telefonoMovil
     * @return UserDet
     */
    public function setTelefonoMovil($telefonoMovil)
    {
        $this->telefonoMovil = $telefonoMovil;
    
        return $this;
    }

    /**
     * Get telefonoMovil
     *
     * @return string 
     */
    public function getTelefonoMovil()
    {
        return $this->telefonoMovil;
    }


    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return UserDet
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
     * @return UserDet
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
     * Set user
     *
     * @param \Security\SecurityBundle\Entity\User $user
     * @return UserDet
     */
    public function setUser(\Security\SecurityBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Security\SecurityBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set area
     *
     * @param \IDPC\BaseBundle\Entity\Area $area
     * @return UserDet
     */
    public function setArea(\IDPC\BaseBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \IDPC\BaseBundle\Entity\Area 
     */
    public function getArea()
    {
        return $this->area;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estudiosPrevios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add estudiosPrevios
     *
     * @param \IDPC\SolicitudBundle\Entity\EstudioPrevio $estudiosPrevios
     * @return UserDet
     */
    public function addEstudiosPrevio(\IDPC\SolicitudBundle\Entity\EstudioPrevio $estudiosPrevios)
    {
        $this->estudiosPrevios[] = $estudiosPrevios;

        return $this;
    }

    /**
     * Remove estudiosPrevios
     *
     * @param \IDPC\SolicitudBundle\Entity\EstudioPrevio $estudiosPrevios
     */
    public function removeEstudiosPrevio(\IDPC\SolicitudBundle\Entity\EstudioPrevio $estudiosPrevios)
    {
        $this->estudiosPrevios->removeElement($estudiosPrevios);
    }

    /**
     * Get estudiosPrevios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEstudiosPrevios()
    {
        return $this->estudiosPrevios;
    }
}
