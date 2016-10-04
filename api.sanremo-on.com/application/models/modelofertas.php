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
		$microsite = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$r->getIdmicrosite()->getIdmicrosite()));
		$r->setIdmicrosite($microsite);
		return $r;
	}
	public function getByUrl($url){
		$todos = $this->bd->findBy([], ['fechainicio' => 'DESC']); //findAll();
		foreach ($todos as $key => $value) {
			$urls = (array)json_decode($value->getUrl());
			foreach ($urls as $k => $v) {
				if($v == $url){
					return $value;
				}
			}
		}
		// return $this->bd->findOneBy(array('url'=>$url));	
	}
	public function getAll(){
		$categoria = $this->bd->findBy(array('estatus' => '1'),array('fechainicio'=>'DESC'));
		foreach ($categoria as $key => $value) {
			$microsite = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$value->getIdmicrosite()->getIdmicrosite()));
			$value->setIdmicrosite($microsite);
			$statement = $this->em->getConnection();
			$results = $statement->query("SELECT t.micrositefk,t.categoriafk FROM categoriaMicrosite t where t.micrositefk ='".$value->getIdmicrosite()->getIdmicrosite()."'");  
			$value->getIdmicrosite()->setCategoriafk($results->fetchAll());
                                                /* Added Code to hide expired offers   */
                                                $value->current_date = date("Y-m-d");   
                                                /* SIPL VC 14-09-2016 */ 
		}
			// foreach ($value->getIdmicrosite() as $k => $v) {
			// 	}
			// }
                                
		return $categoria;
	}
	public function getMicroByUser(){
		$microsite = $this->em->getRepository('Microsite')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser(),'estatus' => '1'));
		return array('id'=>$microsite->getIdmicrosite(),'microsite'=>$microsite->getNombre());	
	}
	public function getAllByUser(){
		$microsite = $this->em->getRepository('Microsite')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser(),'estatus' => '1'));
		// print_r($microsite->getIdmicrosite());
		$ress = array();
		$res = $this->bd->findBy([], ['fechainicio' => 'DESC']); //findAll();
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
				$oferta->setImagengrid(md5($data['nombre'].'0'))
				->setImagenbody(md5($data['nombre'].'1'));
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
			->setCreado(Date('Y-m-d H:i:s'))
			->setPaquete($data['paquete'] ? 1 : 0);
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
			->setCreado(Date('Y-m-d H:i:s'))
			->setPaquete($data['paquete'] ? 1 : 0);
			$this->em->persist($oferta);
			$this->em->flush();
		}
		return true;
	}
	

}

