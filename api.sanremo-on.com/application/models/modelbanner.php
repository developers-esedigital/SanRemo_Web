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
class ModelBanner extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->bd = $this->doctrine->em->getRepository('Banner');
		$this->em = $this->doctrine->em;
	}
	public function get($id){
		$r = $this->bd->findOneBy(array('idbanner'=>$id));
		return $r;
	}
	public function getAll(){
		$categoria = $this->bd->findAll();
		$res = array();
		foreach ($categoria as $key => $value) {
			if($value->getEstatus() == '1'){
				$res[] = $value;
			}
		}
		return $res;
	}
	public function delete($id){
		$exp = $this->bd->findOneBy(array('idbanner'=>$id));
		$this->em->remove($exp);
    	$this->em->flush();
    	return true;
	}
	public function save($data){
		$oferta = new Banner();
		$galeria =__DIR__.'/../../public/uploads/banners/';
		if(!file_exists($galeria))
				mkdir($galeria, 0777,true);

		if(isset($data['idbanner'])){
			$oferta = $this->em->getRepository('Banner')->findOneBy(array('idbanner'=>$data['idbanner']));
			if(isset($_FILES['principal'])){
				$nameP = $galeria.$oferta->getImgnormal();
				move_uploaded_file($_FILES['principal']['tmp_name'],$nameP);
			}
			if(isset($_FILES['movil'])){
				$nameP = $galeria.$oferta->getImgmovil();
				move_uploaded_file($_FILES['movil']['tmp_name'],$nameP);
			}
			$oferta->setEstatus(isset($data['estatusBanner']) ? 1 : 0);
			$this->em->merge($oferta);
			$this->em->flush();
		}else{
			$nombre = rand(1000,9999);
			$nameP = $galeria.md5($nombre);
			move_uploaded_file($_FILES['principal']['tmp_name'],$nameP);
			// LOGO
			$nameP = $galeria.md5('movil-'.$nombre);
			move_uploaded_file($_FILES['movil']['tmp_name'],$nameP);
			$oferta->setImgnormal(md5($nombre))
			->setImgmovil(md5('movil-'.$nombre))
			->setEstatus(isset($data['estatusBanner']) ? 1 : 0);
			$this->em->persist($oferta);
			$this->em->flush();
		}
		return true;
	}
	

}

