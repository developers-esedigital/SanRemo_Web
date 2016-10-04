<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\Texto
 *
 * @ORM\Table(name="texto")
 * @ORM\Entity
 */
class Texto
{
    /**
     * @var integer $idtexto
     *
     * @ORM\Column(name="idtexto", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idtexto;

    /**
     * @var string $titulo
     *
     * @ORM\Column(name="titulo", type="string", length=45, nullable=false)
     */
    public $titulo;

    /**
     * @var string $tboton
     *
     * @ORM\Column(name="tboton", type="string", nullable=false)
     */
    public $tboton;

    /**
     * @var text $turl
     *
     * @ORM\Column(name="turl", type="text", nullable=false)
     */
    public $turl;

    /**
     * @var integer $estatus
     *
     * @ORM\Column(name="estatus", type="integer", nullable=false)
     */
    public $estatus;
}