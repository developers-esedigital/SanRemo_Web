<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iduser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivelusuario", type="integer", nullable=false)
     */
    private $nivelusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="estatus", type="integer", nullable=false)
     */
    private $estatus;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=200, nullable=true)
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="creado", type="string", length=100, nullable=true)
     */
    private $creado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Microsite", inversedBy="user")
     * @ORM\JoinTable(name="favorito",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user", referencedColumnName="iduser")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="microsite", referencedColumnName="idmicrosite")
     *   }
     * )
     */
    private $microsite;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->microsite = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get iduser
     *
     * @return integer 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
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
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
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
     * Set nivelusuario
     *
     * @param integer $nivelusuario
     * @return User
     */
    public function setNivelusuario($nivelusuario)
    {
        $this->nivelusuario = $nivelusuario;
    
        return $this;
    }

    /**
     * Get nivelusuario
     *
     * @return integer 
     */
    public function getNivelusuario()
    {
        return $this->nivelusuario;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
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
     * Set estatus
     *
     * @param integer $estatus
     * @return User
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return integer 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set creado
     *
     * @param string $creado
     * @return User
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;
    
        return $this;
    }

    /**
     * Get creado
     *
     * @return string 
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return User
     */
    public function setFoto($foto){
        $this->foto = $foto;
        return $this;
    }
     /**
     * Get foto
     *
     * @return string
     */
    public function getFoto(){
        return $this->foto;
    }
    /**
     * Add microsite
     *
     * @param \Microsite $microsite
     * @return User
     */
    public function addMicrosite(\Microsite $microsite)
    {
        $this->microsite[] = $microsite;
    
        return $this;
    }

    /**
     * Remove microsite
     *
     * @param \Microsite $microsite
     */
    public function removeMicrosite(\Microsite $microsite)
    {
        $this->microsite->removeElement($microsite);
    }

    /**
     * Get microsite
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMicrosite()
    {
        return $this->microsite;
    }
}
