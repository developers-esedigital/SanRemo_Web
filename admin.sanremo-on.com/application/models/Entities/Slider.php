<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Slider
 *
 * @ORM\Table(name="slider")
 * @ORM\Entity
 */
class Slider
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idslider", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idslider;

    /**
     * @var string
     *
     * @ORM\Column(name="imgNormal", type="string", length=100, nullable=false)
     */
    private $imgnormal;

    /**
     * @var string
     *
     * @ORM\Column(name="fondo", type="string", length=100, nullable=false)
     */
    private $fondo;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=5, nullable=false)
     */
    private $estatus;

 


    /**
     * Get idslider
     *
     * @return integer 
     */
    public function getIdslider()
    {
        return $this->idslider;
    }

    /**
     * Set imgnormal
     *
     * @param string $imgnormal
     * @return Slider
     */
    public function setImgnormal($imgnormal)
    {
        $this->imgnormal = $imgnormal;
    
        return $this;
    }

    /**
     * Get imgnormal
     *
     * @return string 
     */
    public function getImgnormal()
    {
        return $this->imgnormal;
    }



    /**
     * Set fondo
     *
     * @param string $fondo
     * @return Slider
     */
    public function setfondo($fondo)
    {
        $this->fondo = $fondo;
    
        return $this;
    }

    /**
     * Get fondo
     *
     * @return string 
     */
    public function getfondo()
    {
        return $this->fondo;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     * @return Slider
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

 
}
