<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
	public function getByUrl($url){
		$todos = $this->bd->findBy([], ['fechainicio' => 'DESC']);//findAll();
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
			if($value->getMicrosite() == $microsite->getIdmicrosite())
				$ress[] = $value;
		}
		// print_r($ress);
		return $ress;
	}
	public function getAll(){
		//$qb = $this->$em->createQueryBuilder();
		$categoria = $this->bd->findBy(array('estatus' => '1'),array('fechainicio'=>'DESC'));
		// $query = $this->db->query("SELECT * FROM noticia WHERE estatus=1 ORDER BY STR_TO_DATE(fechaInicio, '%m/%d/%Y') DESC ");
		// $categoria = $query->row();
		// $qb->select('n')
		//    ->from('noticia', 'n')
		//    ->where('n.estatus = 1')
		//    ->orderBy("STR_TO_DATE(n.fechaInicio, '%m/%d/%Y')", 'DESC');
		//    $categoria = $qb->getQuery();
		foreach ($categoria as $key => $value) {
			if(is_null($value->getMicrosite()) || !isset($value->microsite) ){
				continue;
			}
			$microsite = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$value->microsite));
			$value->nomMicro = @$microsite->nombre;
                                                /* Added Code to hide expired offers   */
                                                $value->current_date = date("Y-m-d");   
                                                /* SIPL VC 14-09-2016 */ 
		}
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
		$noticia = new Noticia();
		if(isset($data['idnoticia'])){
			$noticia = $this->bd->findOneBy(array('idnoticia'=>$data['idnoticia']));
			if (isset($_FILES)) {
				$galeria =__DIR__."/../../public/uploads/noticia/"; 
				mkdir($galeria, 0777,true);
				// print_r($_FILES['imagePrincipal']['tmp_name']);
				$nameP = $galeria.md5($data['nombre'].'0');
				move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
				$nameBody = $galeria.md5($data['nombre'].'1');
				move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
				# code...
				$noticia
				->setImagengrid($nameP)
				->setImagenbody($nameBody);
			}
			
			// $micro = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$data['idmicrosite']));
			$noticia->setMicrosite($data['idmicrosite'])
			->setNombre($data['nombre'])
			->setFechainicio($data['rango'])
			->setTitle($data['title'])
			->setUrl($data['url'])
			->setDescription($data['description'])
			->setFechafin($data['rango'])
			->setDescripcion($data['descripcion'])
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'));
			$this->em->merge($noticia);
			$this->em->flush();
		}else{
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
			$noticia->setMicrosite($data['idmicrosite'])
			->setNombre($data['nombre'])
			->setTitle($data['title'])
			->setUrl($data['url'])
			->setDescription($data['description'])
			->setFechainicio($data['rango'])
			->setFechafin($data['rango'])
			->setImagengrid($nameP)
			->setImagenbody($nameBody)
			->setDescripcion($data['descripcion'])
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'));
			$this->em->persist($noticia);
			$this->em->flush();
		}
		return true;
	}
	

}

