<?php

namespace Security\SecurityBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Security\SecurityBundle\Entity\User
 * 
  * @ORM\Entity()
  * @ORM\Table(name="admin_user")
  */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\Column(type="string")
    * @Assert\Length( max = "255")
    */
    protected $username;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\Length( max = "100")
     * @Assert\Email()
     */
    
    protected $email;
    
    

    /**
     * @ORM\OneToOne(targetEntity="UserDet", mappedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="UserDet_id", referencedColumnName="id")
     * @Assert\Type(type="Security\SecurityBundle\Entity\UserDet")
     */
    
    protected $userdet;

    /**
     * @ORM\Column(name="password", type="string")
     * @Assert\Length( max = "255")
     */
    protected $password;

    /**
     * @ORM\Column(name="salt", type="string")
     */
    protected $salt;

    /**
     * se utilizó user_roles para no hacer conflicto al aplicar ->toArray en getRoles()
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     */
    protected $user_roles;

    public function __construct()
    {
        $this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Add user_roles
     *
     * @param Security\SecurityBundle\Entity\Role $userRoles
     */
    public function addRole(\Security\SecurityBundle\Entity\Role $userRoles)
    {
        $this->user_roles[] = $userRoles;
    }

    public function setUserRoles($roles) {
        $this->user_roles = $roles;
    }

    /**
     * Get user_roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUserRoles()
    {
        return $this->user_roles;
    }

    /**
     * Get roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->user_roles->toArray(); //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
    }

    /**
     * Compares this user to another to determine if they are the same.
     *
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user) {
        return md5($this->getUsername()) == md5($user->getUsername());

    }

    /**
     * Erases the user credentials.
     */
    public function eraseCredentials() {

    }
    
    /**
     * @return string
     */
    public function serialize()
    {
        /*
         * ! Don't serialize $roles field !
         */
        return \json_encode(array(
            $this->id
            //$this->username,
            //$this->email,
            //$this->salt
            //$this->password,
            //$this->isActive
        ));
    }

    /**
     * @param serialized
     */
    public function unserialize($serialized)
    {
        list (
            $this->id
            //$this->username,
            //$this->email,
            //$this->salt
            //$this->password,
            //$this->isActive
        ) = \json_decode($serialized);
    }



    /**
     * Add user_roles
     *
     * @param \Security\SecurityBundle\Entity\Role $userRoles
     * @return User
     */
    public function addUserRole(\Security\SecurityBundle\Entity\Role $userRoles)
    {
        $this->user_roles[] = $userRoles;
    
        return $this;
    }

    /**
     * Remove user_roles
     *
     * @param \Security\SecurityBundle\Entity\Role $userRoles
     */
    public function removeUserRole(\Security\SecurityBundle\Entity\Role $userRoles)
    {
        $this->user_roles->removeElement($userRoles);
    }
    


    /**
     * Set userdet
     *
     * @param \Security\SecurityBundle\Entity\UserDet $userdet
     * @return User
     */
    public function setUserdet(\Security\SecurityBundle\Entity\UserDet $userdet = null)
    {
        $this->userdet = $userdet;
    
        return $this;
    }

    /**
     * Get userdet
     *
     * @return \Security\SecurityBundle\Entity\UserDet 
     */
    public function getUserdet()
    {
        return $this->userdet;
    }
}