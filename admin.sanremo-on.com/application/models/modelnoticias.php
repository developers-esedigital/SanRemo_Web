<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include_once __DIR__.'/Entities/Categoria.php';
include_once __DIR__.'/Entities/Marca.php';
include_once __DIR__.'/Entities/Evento.php';
include_once __DIR__.'/Entities/Microsite.php';
include_once __DIR__.'/Entities/Oferta.php';
include_once __DIR__.'/Entities/User.php';
include_once __DIR__.'/Entities/Noticia.php';
class ModelNoticias extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->bd = $this->doctrine->em->getRepository('Noticia');
		$this->em = $this->doctrine->em;
	}
	public function get($id){
		$r = $this->bd->findOneBy(array('idnoticia'=>$id));
		return $r;
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
			if($value->getMicrosite() == $microsite->getIdmicrosite())
				$ress[] = $value;
		}
		// print_r($ress);
		return $ress;
	}
	public function getAll(){
		$categoria = $this->bd->findAll();
		return $categoria;
	}
	public function delete($id){
		$exp = $this->bd->findOneBy(array('idnoticia'=>$id));
		$this->em->remove($exp);
    	$this->em->flush();
    	return true;
	}
	public function save($data){
		// print_r($data);
		// exit;
		$config = json_decode(file_get_contents(base_url().'public/js/site.config.json'));
		$noticia = new Noticia();
		if(isset($data['idnoticia'])){
			$noticia = $this->bd->findOneBy(array('idnoticia'=>$data['idnoticia']));
			if (isset($_FILES)  && count($_FILES) > 0) {
				$aux = array();
				for ($i=0; $i < count($config->idiomas); $i++) { 
					$r = $config->idiomas[$i];
					$aux[$r->letras] = $data['nombre-'.$r->letras];
				}
				$data['nombre'] = $aux['it'];
				$galeria =__DIR__."/../../public/uploads/noticia/"; 
				mkdir($galeria, 0777,true);
				// print_r($_FILES['imagePrincipal']['tmp_name']);
				$nameP = $galeria.md5($data['nombre'].'0');
				move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
				$nameBody = $galeria.md5($data['nombre'].'1');
				move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
				# code...
				$noticia
				->setImagengrid(md5($data['nombre'].'0'))
				->setImagenbody(md5($data['nombre'].'1'));
			}
			
			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$noticia->setNombre(json_encode($aux));


			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['descripcion-'.$r->letras];
			}
			$noticia->setDescripcion(json_encode($aux));


			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['url-'.$r->letras];
			}
			$noticia->setUrl(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['description-'.$r->letras];
			}
			$noticia->setDescription(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['title-'.$r->letras];
			}
			$noticia->setTitle(json_encode($aux));
			$fe=$data['rango'];
			$cha = split('/', $fe);
			$fech=$cha[2].'-'.$cha[0].'-'.$cha[1];

			// $micro = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$data['idmicrosite']));
			$noticia->setMicrosite($data['idmicrosite'])
			->setFechainicio($fech)
			->setFechafin($data['rango'])
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'));
			$this->em->merge($noticia);
			$this->em->flush();
		}else{
			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$data['nombre'] = $aux['it'];
			$galeria =__DIR__."/../../public/uploads/noticia/"; 
			mkdir($galeria, 0777,true);
			// print_r($_FILES['imagePrincipal']['tmp_name']);
			$nameP = $galeria.md5($data['nombre'].'0');
			move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
			$nameBody = $galeria.md5($data['nombre'].'1');
			move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
						
			// $micro = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$data['idmicrosite']));
			// var_dump($noticia);
			// exit;


			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$noticia->setNombre(json_encode($aux));


			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['descripcion-'.$r->letras];
			}
			$noticia->setDescripcion(json_encode($aux));


			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['url-'.$r->letras];
			}
			$noticia->setUrl(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['description-'.$r->letras];
			}
			$noticia->setDescription(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['title-'.$r->letras];
			}
			$noticia->setTitle(json_encode($aux));

			$fe=$data['rango'];
			$cha = split('/', $fe);
			$fech=$cha[2].'-'.$cha[0].'-'.$cha[1];

			$noticia->setMicrosite($data['idmicrosite'])
			->setFechainicio($fech)
			->setFechafin($data['rango'])
			->setImagengrid(md5($data['nombre'].'0'))
			->setImagenbody(md5($data['nombre'].'1'))
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'));
			$this->em->persist($noticia);
			$this->em->flush();
		}
		return true;
	}
	

}

