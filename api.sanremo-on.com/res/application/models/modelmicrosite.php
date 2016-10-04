<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(0);
include_once __DIR__.'/Entities/Categoria.php';
include_once __DIR__.'/Entities/Marca.php';
include_once __DIR__.'/Entities/Evento.php';
include_once __DIR__.'/Entities/Microsite.php';
include_once __DIR__.'/Entities/Oferta.php';
include_once __DIR__.'/Entities/User.php';
class ModelMicrosite extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->bd = $this->doctrine->em->getRepository('Microsite');
		$this->em = $this->doctrine->em;
	}
	public function get($idMicro){
		return $this->bd->findOneBy(array('idmicrosite'=>$idMicro));
	}
	public function getCatalogo(){
		$categoria = $this->bd->findAll();
		$res = array();
		foreach ($categoria as $key => $value) {
			$res[$value->getIdmicrosite()] = $value->getNombre();
		}
		
		return $res;
	}
	
	public function getAll(){
		$categoria = $this->bd->findAll();
		return $categoria;
	}
	public function getCategoria($id){
		$categoria = $this->bd->findOneBy(array("idcategoria" => $id));
		return $categoria;
	}
	public function getPadre($id){
		$categoria = $this->getCategoria($id);
		$padre = $this->bd->findOneBy(array('idcategoria'=>$categoria->getParent()));
		return $padre->getNombre();
	}
	public function delete($id){
		$exp = $this->bd->findOneBy(array('idmicrosite'=>$id));
    	$user = $this->em->getRepository('User')->findOneBy(array('iduser'=>$exp->getIduser()->getIduser()));
		$this->em->remove($exp);
		$this->em->remove($user);
    	$this->em->flush();
    	return true;
	}
	public function save($data){
		$microsite = new Microsite();
		if(isset($data['idmicrosite'])){
			if(isset($_FILES)){
				$microsite = $this->bd->findOneBy(array('idmicrosite'=>$data['idmicrosite']));
				$galeria =__DIR__."/../../public/uploads/".md5($data['nombre']).'/galeria/'; 
				$principal =__DIR__."/../../public/uploads/".md5($data['nombre']).'/main/'; 
				mkdir($galeria, 0777,true);
				mkdir($principal, 0777,true);
				// print_r($_FILES['imagePrincipal']['tmp_name']);
				$nameP = $principal.md5($data['nombre']);
				move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
				unset($_FILES['imagePrincipal']);
				$nameGal = array();
				foreach ($_FILES as $key => $value) {
					$file_tmp =$value['tmp_name'];
					move_uploaded_file($file_tmp,$galeria.md5($key.'-'.$data['nombre']));
					$nameGal[] =md5($key.'-'.$data['nombre']);
				}
			}
			if(!isset($data['categoria'])){
				$data['categoria']=array();
			}
			if(!isset($data['subcategoria'])){
				$data['subcategoria']=array();
			}
			$mezcladito = array_merge($data['categoria'],$data['subcategoria']);
			$microsite->setIduser($this->em->getRepository('User')->findOneBy(array('iduser'=>$data['userMicrosite'])))
			->setNombre($data['nombre'])
			->setLogoPrincipal(md5($data['nombre']))
			->setLogo(md5('logo'.$data['nombre']))
			->setApertura($data['apertura'])
			->setCierre($data['cierre'])
			->setTitle($data['title'])
			->setUrl($data['url'])
			->setDescription($data['description'])
			->setImagenslider(implode(',',$nameGal))
			->setDireccion($data['direccion'])
			->setPuntogoogle($data['Lat'].','.$data['Long'])
			->setPagina($data['website'])
			->setTelefono($data['telefono'])
			->setEmail($data['email'])
			->setDescripcion($data['descripcion'])
			->setIdioma('es')
			->setIdbase('0')
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'))
			->removeAllCategorias();
			foreach ($mezcladito as $key => $value) {
				$microsite->addCategoriafk($this->em->getRepository('Categoria')->findOneBy(array('idcategoria'=>$value)));
			}

			$this->em->merge($microsite);
			$this->em->flush();
			return true;
		}else{
			$galeria =__DIR__."/../../public/uploads/".md5($data['nombre']).'/galeria/'; 
			$principal =__DIR__."/../../public/uploads/".md5($data['nombre']).'/main/'; 
			mkdir($galeria, 0777,true);
			mkdir($principal, 0777,true);
			// print_r($_FILES['imagePrincipal']['tmp_name']);
			$nameP = $principal.md5($data['nombre']);
			move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
			unset($_FILES['imagePrincipal']);
			$nameGal = array();
			foreach ($_FILES as $key => $value) {
				$file_tmp =$value['tmp_name'];
				move_uploaded_file($file_tmp,$galeria.md5($key.'-'.$data['nombre']));
				$nameGal[] =md5($key.'-'.$data['nombre']);
			}
			if(!isset($data['categoria'])){
				$data['categoria']=array();
			}
			if(!isset($data['subcategoria'])){
				$data['subcategoria']=array();
			}
			$mezcladito = array_merge($data['categoria'],$data['subcategoria']);
			$microsite->setIduser($this->em->getRepository('User')->findOneBy(array('iduser'=>$data['userMicrosite'])))
			->setNombre($data['nombre'])
			->setLogoPrincipal(md5($data['nombre']))
			->setLogo(md5('logo'.$data['nombre']))
			->setApertura($data['apertura'])
			->setCierre($data['cierre'])
			->setTitle($data['title'])
			->setUrl($data['url'])
			->setDescription($data['description'])
			->setImagenslider(implode(',',$nameGal))
			->setDireccion($data['direccion'])
			->setPuntogoogle($data['Lat'].','.$data['Long'])
			->setPagina($data['website'])
			->setTelefono($data['telefono'])
			->setEmail($data['email'])
			->setDescripcion($data['descripcion'])
			->setIdioma('es')
			->setIdbase('0')
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'));
			foreach ($mezcladito as $key => $value) {
				$microsite->addCategoriafk($this->em->getRepository('Categoria')->findOneBy(array('idcategoria'=>$value)));
			}
			$this->em->persist($microsite);
			$this->em->flush();
		}
		return true;
	}
	

}

