<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Fondo
 *
 * @ORM\Table(name="backg")
 * @ORM\Entity
 */
class Fondo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idbackg", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbackg;

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
     * Get idslider
     *
     * @return integer 
     */
    public function getIdbackg()
    {
        return $this->idbackg;
    }

    /**
     * Set imgnormal
     *
     * @param string $imgnormal
     * @return Backg
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
     * @return Backg
     */
    public function setFondo($fondo)
    {
        $this->fondo = $fondo;
    
        return $this;
    }

    /**
     * Get fondo
     *
     * @return string 
     */
    public function getFondo()
    {
        return $this->fondo;
    }




 
}
