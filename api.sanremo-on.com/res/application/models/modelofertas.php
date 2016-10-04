<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once __DIR__.'/Entities/Categoria.php';
include_once __DIR__.'/Entities/Marca.php';
include_once __DIR__.'/Entities/Evento.php';
include_once __DIR__.'/Entities/Microsite.php';
include_once __DIR__.'/Entities/Oferta.php';
include_once __DIR__.'/Entities/User.php';
class ModelOfertas extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->bd = $this->doctrine->em->getRepository('Oferta');
		$this->em = $this->doctrine->em;
	}
	public function get($id){
		$r = $this->bd->findOneBy(array('idoferta'=>$id));
		return $r;
	}
	public function getAll(){
		$categoria = $this->bd->findAll();
		return $categoria;
	}
	public function getMicroByUser(){
		$microsite = $this->em->getRepository('Microsite')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser()));
		return array('id'=>$microsite->getIdmicrosite(),'microsite'=>$microsite->getNombre());	
	}
	public function getAllByUser(){
		$microsite = $this->em->getRepository('Microsite')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser()));
		// print_r($microsite->getIdmicrosite());
		$ress = array();
		$res = $this->bd->findAll();
		foreach ($res as $key => $value) {
			if($value->getIdmicrosite()->getIdmicrosite() == $microsite->getIdmicrosite())
				$ress[] = $value;
		}
		// print_r($ress);
		return $ress;
	}
	public function delete($id){
		$exp = $this->bd->findOneBy(array('idoferta'=>$id));
		$this->em->remove($exp);
    	$this->em->flush();
    	return true;
	}
	public function save($data){
		$oferta = new Oferta();
		// print_r($this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$data['idmicrosite'])));
		// print_r($data);
		// exit;
		if(isset($data['idoferta'])){
			if(isset($_FILES)){
				$galeria =__DIR__."/../../public/uploads/ofertas/"; 
				mkdir($galeria, 0777,true);
				// print_r($_FILES['imagePrincipal']['tmp_name']);
				$nameP = $galeria.md5($data['nombre'].'0');
				move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
				$nameBody = $galeria.md5($data['nombre'].'1');
				move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
				$oferta->setImagengrid($nameP)
				->setImagenbody($nameBody);
			}
			$micro = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$data['idmicrosite']));
			$oferta->setIdmicrosite($micro)
			->setIdoferta($data['idoferta'])
			->setNombre($data['nombre'])
			->setFechainicio($data['rango'])
			->setTitle($data['title'])
			->setUrl($data['url'])
			->setDescription($data['description'])
			->setFechafin($data['rango'])
			->setPorcentaje($data['porcentaje'])
			->setDescripcion($data['descripcion'])
			->setIdioma('es')
			->setIdbase('0')
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'));
			// print_r($oferta);
			// exit;
			$this->em->merge($oferta);
			$this->em->flush();
		}else{
			$galeria =__DIR__."/../../public/uploads/ofertas/"; 
			mkdir($galeria, 0777,true);
			// print_r($_FILES['imagePrincipal']['tmp_name']);
			$nameP = $galeria.md5($data['nombre'].'0');
			move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
			$nameBody = $galeria.md5($data['nombre'].'1');
			move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
						
			$micro = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$data['idmicrosite']));
			$oferta->setIdmicrosite($micro)
			->setNombre($data['nombre'])
			->setFechainicio($data['rango'])
			->setFechafin($data['rango'])
			->setTitle($data['title'])
			->setUrl($data['url'])
			->setDescription($data['description'])
			->setImagengrid($nameP)
			->setImagenbody($nameBody)
			->setPorcentaje($data['porcentaje'])
			->setDescripcion($data['descripcion'])
			->setIdioma('es')
			->setIdbase('0')
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'));
			$this->em->persist($oferta);
			$this->em->flush();
		}
		return true;
	}
	

}

