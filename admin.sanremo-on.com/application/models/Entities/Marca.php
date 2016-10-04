<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Marca
 *
 * @ORM\Table(name="marca")
 * @ORM\Entity
 */
class Marca
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmarca", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmarca;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="creado", type="string", length=45, nullable=false)
     */
    private $creado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Microsite", mappedBy="idmarca")
     */
    private $idmicrosite;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idmicrosite = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idmarca
     *
     * @return integer 
     */
    public function getIdmarca()
    {
        return $this->idmarca;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Marca
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
     * Set creado
     *
     * @param string $creado
     * @return Marca
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
     * Add idmicrosite
     *
     * @param \Microsite $idmicrosite
     * @return Marca
     */
    public function addIdmicrosite(\Microsite $idmicrosite)
    {
        $this->idmicrosite[] = $idmicrosite;
    
        return $this;
    }

    /**
     * Remove idmicrosite
     *
     * @param \Microsite $idmicrosite
     */
    public function removeIdmicrosite(\Microsite $idmicrosite)
    {
        $this->idmicrosite->removeElement($idmicrosite);
    }

    /**
     * Get idmicrosite
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdmicrosite()
    {
        return $this->idmicrosite;
    }
}
