<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Noticia
 *
 * @ORM\Table(name="noticia")
 * @ORM\Entity
 */
class Noticia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idnoticia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnoticia;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaInicio", type="string", length=45, nullable=true)
     */
    private $fechainicio;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaFin", type="string", length=45, nullable=true)
     */
    private $fechafin;

    /**
     * @var integer
     *
     * @ORM\Column(name="microsite", type="integer", nullable=true)
     */
    private $microsite;

    /**
     * @var string
     *
     * @ORM\Column(name="imagenGrid", type="string", length=100, nullable=true)
     */
    private $imagengrid;

    /**
     * @var string
     *
     * @ORM\Column(name="imagenBody", type="string", length=100, nullable=true)
     */
    private $imagenbody;

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
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=45, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=55, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=156, nullable=true)
     */
    private $description;


    /**
     * Get idnoticia
     *
     * @return integer 
     */
    public function getIdnoticia()
    {
        return $this->idnoticia;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Noticia
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
     * @return Noticia
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
     * @return Noticia
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
     * Set imagengrid
     *
     * @param string $imagengrid
     * @return Noticia
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
     * @return Noticia
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Noticia
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
     * Set url
     *
     * @param string $url
     * @return Noticia
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Noticia
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Noticia
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
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
}
