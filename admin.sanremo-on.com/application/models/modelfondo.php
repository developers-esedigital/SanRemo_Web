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
include_once __DIR__.'/Entities/Fondo.php';
class ModelFondo extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->bd = $this->doctrine->em->getRepository('Fondo');
		$this->em = $this->doctrine->em;
	}
	public function get($id){
		$r = $this->bd->findOneBy(array('idbackg'=>$id));
		return $r;
	}
	public function getAll(){
		$categoria = $this->bd->findAll();
		return $categoria;
	}
	public function delete($id){
		$exp = $this->bd->findOneBy(array('idbackg'=>$id));
		$this->em->remove($exp);
    	$this->em->flush();
    	return true;
	}
	public function save($data){

		$oferta = new Fondo();
		$nombre = rand(1000,9999);
				$galeria =__DIR__.'/../../public/uploads/backg/';
				if(!file_exists($galeria))
						mkdir($galeria, 0777,true);

					
				if(isset($data['idbackg'])){

					$oferta = $this->em->getRepository('Fondo')->findOneBy(array('idbackg'=>$data['idbackg']));
					
					if(isset($_FILES['principal'])){

						$nameP = $galeria.md5($nombre);
						move_uploaded_file($_FILES['principal']['tmp_name'],$nameP);
					}
					if(isset($_FILES['fondo'])){
						$nameP = $galeria.md5('fondo-'.$nombre);
						move_uploaded_file($_FILES['fondo']['tmp_name'],$nameP);
					}
					$oferta->setImgnormal(md5($nombre))
					->setfondo(md5('fondo-'.$nombre));
					
					//$oferta->setEstatus(isset($data['estatusSlider']) ? 1 : 0);
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
			$oferta->setImgnormal(md5($nombre))
			->setfondo(md5('fondo-'.$nombre));
			//->setEstatus(isset($data['estatusSlider']) ? 1 : 0);
			
			//print_r($data);
			$this->em->persist($oferta);
			$this->em->flush();
		}
		return true;
	}
	

}

