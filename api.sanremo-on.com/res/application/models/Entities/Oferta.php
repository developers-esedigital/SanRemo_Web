<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Oferta
 *
 * @ORM\Table(name="oferta")
 * @ORM\Entity
 */
class Oferta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idoferta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoferta;

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
     * @ORM\Column(name="imagenGrid", type="string", length=45, nullable=true)
     */
    private $imagengrid;

    /**
     * @var string
     *
     * @ORM\Column(name="imagenBody", type="string", length=45, nullable=true)
     */
    private $imagenbody;

    /**
     * @var string
     *
     * @ORM\Column(name="porcentaje", type="string", length=45, nullable=true)
     */
    private $porcentaje;

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
     * @ORM\Column(name="predeterminado", type="string", length=45, nullable=true)
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
     * @var \Microsite
     *
     * @ORM\ManyToOne(targetEntity="Microsite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmicrosite", referencedColumnName="idmicrosite")
     * })
     */
    private $idmicrosite;


    /**
     * Get idoferta
     *
     * @return integer 
     */
    public function setIdoferta($oferta){
        $this->idoferta = $oferta;
        return $this;
    }
    public function getIdoferta()
    {
        return $this->idoferta;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Oferta
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
     * @return Oferta
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
     * @return Oferta
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
     * Set imagengrid
     *
     * @param string $imagengrid
     * @return Oferta
     */
    public function setImagengrid($imagengrid)
    {
        $this->imagengrid = $imagengrid;
    
        return $this;
    }

    /**
     * Get imagengrid
     *
     * @return string 
     */
    public function getImagengrid()
    {
        return $this->imagengrid;
    }

    /**
     * Set imagenbody
     *
     * @param string $imagenbody
     * @return Oferta
     */
    public function setImagenbody($imagenbody)
    {
        $this->imagenbody = $imagenbody;
    
        return $this;
    }

    /**
     * Get imagenbody
     *
     * @return string 
     */
    public function getImagenbody()
    {
        return $this->imagenbody;
    }

    /**
     * Set porcentaje
     *
     * @param string $porcentaje
     * @return Oferta
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;
    
        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return string 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Oferta
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
     * @return Oferta
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
     * @return Oferta
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
     * @return Oferta
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
     * @return Oferta
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
     * @return Oferta
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
     * Set idmicrosite
     *
     * @param \Microsite $idmicrosite
     * @return Oferta
     */
    public function setIdmicrosite(\Microsite $idmicrosite = null)
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
}
