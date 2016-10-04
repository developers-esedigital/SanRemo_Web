<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once __DIR__.'/Entities/Categoria.php';
include_once __DIR__.'/Entities/Marca.php';
include_once __DIR__.'/Entities/Evento.php';
include_once __DIR__.'/Entities/Microsite.php';
include_once __DIR__.'/Entities/Oferta.php';
include_once __DIR__.'/Entities/User.php';
include_once __DIR__.'/Entities/Banner.php';
include_once __DIR__.'/Entities/Servicio.php';
include_once __DIR__.'/Entities/Slider.php';
include_once __DIR__.'/Entities/Gallery.php';
class ModelGallery extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->bd = $this->doctrine->em->getRepository('Gallery');
		$this->em = $this->doctrine->em;
	}
	public function get($id){
		$r = $this->bd->findOneBy(array('idgallery'=>$id));
		return $r;
	}
	public function getAll(){
		$categoria = $this->bd->findAll();
		return $categoria;
	}
	public function delete($id){
		$exp = $this->bd->findOneBy(array('idgallery'=>$id));
		$this->em->remove($exp);
    	$this->em->flush();
    	return true;
	}
	public function save($data){
		$oferta = new Gallery();
		$galeria =__DIR__.'/../../public/uploads/gallery/';
		if(!file_exists($galeria))
				mkdir($galeria, 0777,true);

		if(isset($data['idslider'])){
			$oferta = $this->em->getRepository('Gallery')->findOneBy(array('idgallery'=>$data['idgallery']));
			if(isset($_FILES['principal'])){
				$nameP = $galeria.$oferta->getImgn();
				move_uploaded_file($_FILES['principal']['tmp_name'],$nameP);
			}
			if(isset($_FILES['fondo'])){
				$nameP = $galeria.$oferta->getImgr();
				move_uploaded_file($_FILES['fondo']['tmp_name'],$nameP);
			}
			$oferta->setEstatus(isset($data['estatusSlider']) ? 1 : 0);
			//$oferta->setUrl(isset($data['url']) ? $data['url'] : '');
			$this->em->merge($oferta);
			$this->em->flush();
		}else{
			$nombre = rand(1000,9999);
			$nameP = $galeria.md5($nombre);
			move_uploaded_file($_FILES['principal']['tmp_name'],$nameP);
			// LOGO
			$nameP = $galeria.md5('fondo-'.$nombre);
			move_uploaded_file($_FILES['fondo']['tmp_name'],$nameP);
			$oferta->setImgn(md5($nombre))
			->setImgr(md5('fondo-'.$nombre))
			->setEstatus(isset($data['estatusSlider']) ? 1 : 0);
			
			//print_r($data);
			$this->em->persist($oferta);
			$this->em->flush();
		}
		return true;
	}
	

}

