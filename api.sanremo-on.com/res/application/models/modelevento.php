<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once __DIR__.'/Entities/Categoria.php';
include_once __DIR__.'/Entities/Marca.php';
include_once __DIR__.'/Entities/Evento.php';
include_once __DIR__.'/Entities/Microsite.php';
include_once __DIR__.'/Entities/Oferta.php';
include_once __DIR__.'/Entities/User.php';
class ModelEvento extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->bd = $this->doctrine->em->getRepository('Evento');
		$this->em = $this->doctrine->em;
	}
	public function get($id){
		$r = $this->bd->findOneBy(array('idevento'=>$id));
		return $r;
	}
	public function getAll(){
		$categoria = $this->bd->findAll();
		return $categoria;
	}
	public function delete($id){
		$exp = $this->bd->findOneBy(array('idevento'=>$id));
		$this->em->remove($exp);
    	$this->em->flush();
    	return true;
	}
	public function save($data){
		$oferta = new Evento();
		if(isset($data['idevento'])){
			$oferta = $this->bd->findOneBy(array('idevento'=>$data['idevento']));
			if(isset($_FILES)){
				$galeria =__DIR__."/../../public/uploads/evento/"; 
				mkdir($galeria, 0777,true);
				// print_r($_FILES['imagePrincipal']['tmp_name']);
				$nameP = $galeria.md5($data['nombre'].'0');
				move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
				$nameBody = $galeria.md5($data['nombre'].'1');
				move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
				$oferta->setFotogrid($nameP)
				->setFotobody($nameBody);
			}
			$oferta->setNombre($data['nombre'])
			->setFechainicio($data['rango'])
			->setFechafin($data['rango'])
			->setTitle($data['title'])
			->setUrl($data['url'])
			->setDescription($data['description'])
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
			$galeria =__DIR__."/../../public/uploads/evento/"; 
			mkdir($galeria, 0777,true);
			// print_r($_FILES['imagePrincipal']['tmp_name']);
			$nameP = $galeria.md5($data['nombre'].'0');
			move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
			$nameBody = $galeria.md5($data['nombre'].'1');
			move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
						
			$oferta->setNombre($data['nombre'])
			->setFechainicio($data['rango'])
			->setFechafin($data['rango'])
			->setFotogrid($nameP)
			->setTitle($data['title'])
			->setUrl($data['url'])
			->setDescription($data['description'])
			->setFotobody($nameBody)
			->setDescripcion($data['descripcion'])
			->setIdioma('es')
			->setIdbase('0')
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'));
			// var_dump($oferta);
			// exit;
			$this->em->persist($oferta);
			$this->em->flush();
		}
		return true;
	}
	

}

