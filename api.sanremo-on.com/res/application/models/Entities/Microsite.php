<?php

include_once 'Categoria.php';

use Doctrine\ORM\Mapping as ORM;

/**
 * Microsite
 *
 * @ORM\Table(name="microsite")
 * @ORM\Entity
 */
class Microsite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmicrosite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmicrosite;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=500, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="logoPrincipal", type="string", length=500, nullable=false)
     */
    private $logoprincipal;

    /**
     * @var string
     *
     * @ORM\Column(name="imagenSlider", type="string", length=800, nullable=false)
     */
    private $imagenslider;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=500, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="puntoGoogle", type="string", length=500, nullable=false)
     */
    private $puntogoogle;

    /**
     * @var string
     *
     * @ORM\Column(name="pagina", type="string", length=500, nullable=true)
     */
    private $pagina;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=45, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1000, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="idioma", type="string", length=45, nullable=false)
     */
    private $idioma;

    /**
     * @var string
     *
     * @ORM\Column(name="idbase", type="string", length=45, nullable=false)
     */
    private $idbase;

    /**
     * @var string
     *
     * @ORM\Column(name="predeterminado", type="string", length=45, nullable=false)
     */
    private $predeterminado;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=45, nullable=false)
     */
    private $estatus;

    /**
     * @var string
     *
     * @ORM\Column(name="creado", type="string", length=45, nullable=false)
     */
    private $creado;



    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=100, nullable=false)
     */
    private $logo;
    /**
     * @var string
     *
     * @ORM\Column(name="apertura", type="string", length=100, nullable=false)
     */
    private $apertura;
    /**
     * @var string
     *
     * @ORM\Column(name="cierre", type="string", length=100, nullable=false)
     */
    private $cierre;
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=100, nullable=false)
     */
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categoria", inversedBy="micrositefk")
     * @ORM\JoinTable(name="categoriaMicrosite",
     *   joinColumns={
     *     @ORM\JoinColumn(name="micrositefk", referencedColumnName="idmicrosite")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="categoriafk", referencedColumnName="idcategoria")
     *   }
     * )
     */
    private $categoriafk;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="microsite")
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Marca", inversedBy="idmicrosite")
     * @ORM\JoinTable(name="micrositeMarca",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idmicrosite", referencedColumnName="idmicrosite")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idmarca", referencedColumnName="idmarca")
     *   }
     * )
     */
    private $idmarca;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="iduser")
     * })
     */
    private $iduser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoriafk = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idmarca = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idmicrosite
     *
     * @return integer 
     */
    public function getIdmicrosite()
    {
        return $this->idmicrosite;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Microsite
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCierre(){
        return $this->cierre;
    }
    public function setCierre($cierre){
        $this->cierre = $cierre;
        return $this;
    }
    public function getLogo(){
        return $this->logo;
    }
    public function setLogo($logo){
        $this->cierre = $logo;
        return $this;
    }
    public function getApertura(){
        return $this->apertura;
    }
    public function setApertura($apertura){
        $this->apertura = $apertura;
        return $this;
    }


    /**
     * Set title
     *
     * @param string $title
     * @return Evento
     */
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle(){
        return $this->title;
    }
    /**
     * Set description
     *
     * @param string $description
     * @return Evento
     */
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }
    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription(){
        return $this->description;
    }
    /**
     * Set url
     *
     * @param string $url
     * @return Evento
     */
    public function setUrl($url){
        $this->url = $url;
        return $this;
    }
    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl(){
        return $this->url;
    }

    /**
     * Set logoprincipal
     *
     * @param string $logoprincipal
     * @return Microsite
     */
    public function setLogoprincipal($logoprincipal)
    {
        $this->logoprincipal = $logoprincipal;
    
        return $this;
    }

    /**
     * Get logoprincipal
     *
     * @return string 
     */
    public function getLogoprincipal()
    {
        return $this->logoprincipal;
    }

    /**
     * Set imagenslider
     *
     * @param string $imagenslider
     * @return Microsite
     */
    public function setImagenslider($imagenslider)
    {
        $this->imagenslider = $imagenslider;
    
        return $this;
    }

    /**
     * Get imagenslider
     *
     * @return string 
     */
    public function getImagenslider()
    {
        return $this->imagenslider;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Microsite
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set puntogoogle
     *
     * @param string $puntogoogle
     * @return Microsite
     */
    public function setPuntogoogle($puntogoogle)
    {
        $this->puntogoogle = $puntogoogle;
    
        return $this;
    }

    /**
     * Get puntogoogle
     *
     * @return string 
     */
    public function getPuntogoogle()
    {
        return $this->puntogoogle;
    }

    /**
     * Set pagina
     *
     * @param string $pagina
     * @return Microsite
     */
    public function setPagina($pagina)
    {
        $this->pagina = $pagina;
    
        return $this;
    }

    /**
     * Get pagina
     *
     * @return string 
     */
    public function getPagina()
    {
        return $this->pagina;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Microsite
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Microsite
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Microsite
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     * @return Microsite
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    
        return $this;
    }

    /**
     * Get idioma
     *
     * @return string 
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set idbase
     *
     * @param string $idbase
     * @return Microsite
     */
    public function setIdbase($idbase)
    {
        $this->idbase = $idbase;
    
        return $this;
    }

    /**
     * Get idbase
     *
     * @return string 
     */
    public function getIdbase()
    {
        return $this->idbase;
    }

    /**
     * Set predeterminado
     *
     * @param string $predeterminado
     * @return Microsite
     */
    public function setPredeterminado($predeterminado)
    {
        $this->predeterminado = $predeterminado;
    
        return $this;
    }

    /**
     * Get predeterminado
     *
     * @return string 
     */
    public function getPredeterminado()
    {
        return $this->predeterminado;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     * @return Microsite
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return string 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set creado
     *
     * @param string $creado
     * @return Microsite
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
     * Add categoriafk
     *
     * @param \Categoria $categoriafk
     * @return Microsite
     */
    public function addCategoriafk(\Categoria $categoriafk)
    {
        $this->categoriafk[] = $categoriafk;
    
        return $this;
    }

    /**
     * Remove categoriafk
     *
     * @param \Categoria $categoriafk
     */
    public function removeCategoriafk(\Categoria $categoriafk)
    {
        $this->categoriafk->removeElement($categoriafk);
    }

    /**
     * Get categoriafk
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategoriafk()
    {
        return $this->categoriafk;
    }

    /**
     * Add user
     *
     * @param \User $user
     * @return Microsite
     */
    public function addUser(\User $user)
    {
        $this->user[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param \User $user
     */
    public function removeUser(\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add idmarca
     *
     * @param \Marca $idmarca
     * @return Microsite
     */
    public function addIdmarca(\Marca $idmarca)
    {
        $this->idmarca[] = $idmarca;
    
        return $this;
    }
    public function removeAllCategorias(){
        $this->categoriafk = new \Doctrine\Common\Collections\ArrayCollection();
        return $this;
    }
    /**
     * Remove idmarca
     *
     * @param \Marca $idmarca
     */
    public function removeIdmarca(\Marca $idmarca)
    {
        $this->idmarca->removeElement($idmarca);
    }

    /**
     * Get idmarca
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdmarca()
    {
        return $this->idmarca;
    }

    /**
     * Set iduser
     *
     * @param \User $iduser
     * @return Microsite
     */
    public function setIduser(\User $iduser = null)
    {
        $this->iduser = $iduser;
    
        return $this;
    }

    /**
     * Get iduser
     *
     * @return \User 
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
