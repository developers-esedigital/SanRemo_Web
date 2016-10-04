<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Banner
 *
 * @ORM\Table(name="banner")
 * @ORM\Entity
 */
class Banner
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idbanner", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbanner;

    /**
     * @var string
     *
     * @ORM\Column(name="imgNormal", type="string", length=100, nullable=false)
     */
    private $imgnormal;

    /**
     * @var string
     *
     * @ORM\Column(name="imgMovil", type="string", length=100, nullable=false)
     */
    private $imgmovil;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=5, nullable=false)
     */
    private $estatus;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=100, nullable=false)
     */

    private $url;


    /**
     * Get idbanner
     *
     * @return integer 
     */
    public function getIdbanner()
    {
        return $this->idbanner;
    }

    /**
     * Set imgnormal
     *
     * @param string $imgnormal
     * @return Banner
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
     * Set imgmovil
     *
     * @param string $imgmovil
     * @return Banner
     */
    public function setImgmovil($imgmovil)
    {
        $this->imgmovil = $imgmovil;
    
        return $this;
    }

    /**
     * Get imgmovil
     *
     * @return string 
     */
    public function getImgmovil()
    {
        return $this->imgmovil;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     * @return Banner
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
     * Set url
     *
     * @param string $url
     * @return Banner
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
}
