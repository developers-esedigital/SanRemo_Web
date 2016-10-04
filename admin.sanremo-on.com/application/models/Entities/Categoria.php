<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity
 */
class Categoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcategoria", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=300, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent", type="integer", nullable=true)
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Microsite", mappedBy="categoriafk")
     */
    private $micrositefk;

    /**
     * @var string
     *
     * @ORM\Column(name="creado", type="string", length=45, nullable=false)
     */
    private $creado;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->micrositefk = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idcategoria
     *
     * @return integer 
     */
    public function getIdcategoria()
    {
        return $this->idcategoria;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Categoria
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
     * Set parent
     *
     * @param integer $parent
     * @return Categoria
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    
        return $this;
    }

    public function setCreado($creado)
    {
        $this->creado = $creado;
    
        return $this;
    }
    public function getCreado()
    {
        return $this->creado;
    }
    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add micrositefk
     *
     * @param \Microsite $micrositefk
     * @return Categoria
     */
    public function addMicrositefk(\Microsite $micrositefk)
    {
        $this->micrositefk[] = $micrositefk;
    
        return $this;
    }

    /**
     * Remove micrositefk
     *
     * @param \Microsite $micrositefk
     */
    public function removeMicrositefk(\Microsite $micrositefk)
    {
        $this->micrositefk->removeElement($micrositefk);
    }

    /**
     * Get micrositefk
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMicrositefk()
    {
        return $this->micrositefk;
    }
}
