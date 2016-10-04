<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity
 */
class Gallery
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idgallery", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgallery;

    /**
     * @var string
     *
     * @ORM\Column(name="imgn", type="string", length=200, nullable=false)
     */
    private $imgn;

    /**
     * @var string
     *
     * @ORM\Column(name="imgr", type="string", length=200, nullable=false)
     */
    private $imgr;

    /**
     * @var integer
     *
     * @ORM\Column(name="estatus", type="integer", nullable=false)
     */
    private $estatus;

 


    /**
     * Get idgallery
     *
     * @return integer 
     */
    public function getIdgallery()
    {
        return $this->idgallery;
    }

    /**
     * Set imgn
     *
     * @param string $imgn
     * @return Gallery
     */
    public function setImgn($imgn)
    {
        $this->imgn = $imgn;
    
        return $this;
    }

    /**
     * Get imgn
     *
     * @return string 
     */
    public function getImgn()
    {
        return $this->imgn;
    }



    /**
     * Set imgr
     *
     * @param string $imgr
     * @return Gallery
     */
    public function setImgr($imgr)
    {
        $this->imgr = $imgr;
    
        return $this;
    }

    /**
     * Get imgr
     *
     * @return string 
     */
    public function getImgr()
    {
        return $this->imgr;
    }

    /**
     * Set estatus
     *
     * @param integer $estatus
     * @return Gallery
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

 
}
