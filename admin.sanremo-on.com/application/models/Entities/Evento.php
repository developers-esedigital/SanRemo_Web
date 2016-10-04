<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Evento
 *
 * @ORM\Table(name="evento")
 * @ORM\Entity
 */
class Evento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idevento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevento;

    /**
     * @var integer
     *
     * @ORM\Column(name="iduser", type="integer", nullable=true)
     */
    private $iduser;

     

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaInicio", type="string", length=45, nullable=false)
     */
    private $fechainicio;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaFin", type="string", length=45, nullable=true)
     */
    private $fechafin;

   /**
     * @var string
     *
     * @ORM\Column(name="puntoGoogle", type="string", length=500, nullable=false)
     */
    private $puntogoogle;


    /**
     * @var string
     *
     * @ORM\Column(name="fotoGrid", type="string", length=45, nullable=false)
     */
    private $fotogrid;

    /**
     * @var string
     *
     * @ORM\Column(name="fotoBody", type="string", length=45, nullable=false)
     */
    private $fotobody;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=45, nullable=false)
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
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
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
     * @var string
     *
     * @ORM\Column(name="dir", type="string", length=100, nullable=false)
     */
    private $dir;

  /**
     * @var \Microsite
     *
     * @ORM\ManyToOne(targetEntity="Microsite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmicrosite", referencedColumnName="idmicrosite")
     * })
     */
    private $idmicrosite;

    /**
     * @var integer
     *
     * @ORM\Column(name="microsite", type="integer", nullable=true)
     */
    private $microsite;
    /**
     * Get idevento
     *
     * @return integer 
     */
    public function getIdevento()
    {
        return $this->idevento;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     * @return Evento
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    
        return $this;
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
     * Set idmicrosite
     *
     * @param integer $idmicrosite
     * @return Evento
     */
    public function setIdmicrosite($idmicrosite)
    {
        
        $this->idmicrosite = $idmicrosite;
    
        return $this;
    }

    /**
     * Get idmicrosite
     *
     * @return \Microsite  
     */
    public function getIdmicrosite()
    {
        return $this->idmicrosite;
    }
    
     /**
     * Set microsite
     *
     * @param integer $microsite
     * @return Noticia
     */
    public function setMicrosite($microsite)
    {
        $this->microsite = $microsite;
    
        return $this;
    }
    
    /**
     * Get microsite
     *
     * @return integer 
     */
    public function getMicrosite()
    {
        return $this->microsite;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Evento
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

    /**
     * Set fechainicio
     *
     * @param string $fechainicio
     * @return Evento
     */
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;
    
        return $this;
    }

    /**
     * Get fechainicio
     *
     * @return string 
     */
    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    /**
     * Set fechafin
     *
     * @param string $fechafin
     * @return Evento
     */
    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;
    
        return $this;
    }

    /**
     * Get fechafin
     *
     * @return string 
     */
    public function getFechafin()
    {
        return $this->fechafin;
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
     * Set fotogrid
     *
     * @param string $fotogrid
     * @return Evento
     */
    public function setFotogrid($fotogrid)
    {
        $this->fotogrid = $fotogrid;
    
        return $this;
    }

    /**
     * Get fotogrid
     *
     * @return string 
     */
    public function getFotogrid()
    {
        return $this->fotogrid;
    }

    /**
     * Set fotobody
     *
     * @param string $fotobody
     * @return Evento
     */
    public function setFotobody($fotobody)
    {
        $this->fotobody = $fotobody;
    
        return $this;
    }

    /**
     * Get fotobody
     *
     * @return string 
     */
    public function getFotobody()
    {
        return $this->fotobody;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Evento
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
     * @return Evento
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
     * @return Evento
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
     * @return Evento
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
     * @return Evento
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
     * @return Evento
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
     * Set dir
     *
     * @param string $dir
     * @return Evento
     */
    public function setDir($dir){
        $this->dir = $dir;
        return $this;
    }
    /**
     * Get dir
     *
     * @return string 
     */
    public function getDir(){
        return $this->dir;
    }
}
