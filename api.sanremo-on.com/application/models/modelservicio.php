<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once __DIR__.'/Entities/Categoria.php';
include_once __DIR__.'/Entities/Marca.php';
include_once __DIR__.'/Entities/Evento.php';
include_once __DIR__.'/Entities/Microsite.php';
include_once __DIR__.'/Entities/Oferta.php';
include_once __DIR__.'/Entities/User.php';
include_once __DIR__.'/Entities/Servicio.php';
class ModelServicio extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->bd = $this->doctrine->em->getRepository('Servicio');
		$this->em = $this->doctrine->em;
	}
	public function get($id){
		$r = $this->bd->findOneBy(array('idservicio'=>$id));
		return $r;
	}
	public function getAll(){
		$categoria = $this->bd->findAll();
		return $categoria;
	}
	public function delete($id){
		$exp = $this->bd->findOneBy(array('idservicio'=>$id));
		$this->em->remove($exp);
    	$this->em->flush();
    	return true;
	}
	public function save($data){
		$oferta = new Servicio();
		if(isset($data['idservicio'])){
			$oferta = $this->em->getRepository('Servicio')->findOneBy(array('idservicio'=>$data['idservicio']));
			$oferta->setNombre($data['nombre']);
			$this->em->merge($oferta);
			$this->em->flush();
		}else{
			$oferta->setNombre($data['nombre'])
			->setCreado(Date('Y-m-d H:i:s'));
			$this->em->persist($oferta);
			$this->em->flush();
		}
		return true;
	}
	

}

