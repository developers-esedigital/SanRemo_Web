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
		// $this->em->remove($user);
    	$this->em->flush();
    	return true;
	}
	public function save($data){
		// print_r($_FILES);
		// print_r($data);
		// exit;
			// $mezcladito = array_merge($data['categoria'],$data['subcategoria']);
			// print_r($mezcladito);
		 // print_r($data);
		// $config = json_decode(file_get_contents(base_url().'public/js/site.config.json'));
		// print_r($config);
		 // exit;

		$config = json_decode(file_get_contents(base_url().'public/js/site.config.json'));

		$microsite = new Microsite();
		if(isset($data['idmicrosite'])){
			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$data['nombre'] = $aux['it'];
			$nameGal = array(); 
			$microsite = $this->bd->findOneBy(array('idmicrosite'=>$data['idmicrosite']));
			$nameAA = array();
			if(count($_FILES) > 0){
				$galeria =__DIR__."/../../public/uploads/".clearStr($data['nombre']).'/galeria/'; 
				$principal =__DIR__."/../../public/uploads/".clearStr($data['nombre']).'/main/'; 
				$logo =__DIR__."/../../public/uploads/".clearStr($data['nombre']).'/logo/'; 
				if(!file_exists($galeria))
					mkdir($galeria, 0777,true);
				if(!file_exists($principal))
					mkdir($principal, 0777,true);
				if(!file_exists($logo))
					mkdir($logo, 0777,true);
				// PRINCIPAL


			foreach ($_FILES as $key => $value) {
				if(strpos($key,'imagePrincipal') !== FALSE){
					$file_tmp =$value['tmp_name'];
					move_uploaded_file($file_tmp,$principal.md5($key.'-'.clearStr($data['nombre'])));
					$nameAA[] =md5($key.'-'.clearStr($data['nombre']));
					unset($_FILES[$key]);
				}
			}
			// print_r($nameP);
			// print_r($_FILES);
			// exit;
			// LOGO
			$nameP  = '';
			if(isset($_FILES['logogris'])){
				$nameP = $logo.md5(clearStr($data['nombre'].'-gris'));
				move_uploaded_file($_FILES['logogris']['tmp_name'],$nameP);
				unset($_FILES['logogris']);
			}


			
				// LOGO
				if(isset($_FILES['logo'])){
					$nameP = $logo.md5(clearStr($data['nombre']));
					move_uploaded_file($_FILES['logo']['tmp_name'],$nameP);
					unset($_FILES['logo']);
				}
				// GALERIA
				if(isset($_FILES['galeria0'])){
			
					foreach ($_FILES as $key => $value) {
						$file_tmp =$value['tmp_name'];
						move_uploaded_file($file_tmp,$galeria.md5($key.'-'.$data['nombre']));
						$nameGal[] =md5($key.'-'.$data['nombre']);
					}
				}
			}
			if(!isset($data['categoria'])){
				$data['categoria']=array();
			}
			if(!isset($data['subcategoria'])){
				$data['subcategoria']=array();
			}
			if(!isset($data['marcas'])){
				$data['marcas']=array();
			}
			$mezcladito = array_merge($data['categoria'],$data['subcategoria']);
			// print_r($mezcladito);
			// exit;

			if(count($nameGal) > 0){
				$microsite->setImagenslider(@implode(',',$nameGal));
			}
			// print_r($nameAA);
			// exit;
			if(count($nameAA) > 0){
				$microsite->setLogoprincipal(@implode(',',$nameAA));
			}


			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$microsite->setNombre(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['descripcion-'.$r->letras];
			}
			$microsite->setDescripcion(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['apertura-'.$r->letras];
			}
			$microsite->setApertura(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['cierre-'.$r->letras];
			}
			$microsite->setCierre(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['title-'.$r->letras];
			}
			$microsite->setTitle(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['url-'.$r->letras];
			}
			$microsite->setUrl(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['description-'.$r->letras];
			}
			$microsite->setDescription(json_encode($aux));

			$microsite->setIduser($this->em->getRepository('User')->findOneBy(array('iduser'=>$data['userMicrosite'])))
			->setLogogris(clearStr($data['nombre'].'-gris'))
			->setLogo(clearStr($data['nombre']))
			->setPuntogoogle($data['Lat'].','.$data['Long'])
			->setPagina($data['website'])
			->setTelefono($data['telefono'])
			->setRuta($data['ruta'])
			->setEmail($data['email'])
			->setIdioma('es')
			->setDireccion($data['direccion'])
			->setFacebook($data['facebook'])
			->setGoogle($data['google'])
			->setTwitter($data['twitter'])
			->setLinkedin($data['linkedin'])
			->setPinterest($data['pinterest'])
			->setInstagram($data['instagram'])
			->setIdbase('0')
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'))
			->removeAllCategorias()
			->removeAllMarcas();
			foreach ($mezcladito as $key => $value) {
				$microsite->addCategoriafk($this->em->getRepository('Categoria')->findOneBy(array('idcategoria'=>$value)));
			}
			// print_r($microsite);
			// exit;
			foreach ($data['marcas'] as $key => $value) {
				$microsite->addIdmarca($this->em->getRepository('Marca')->findOneBy(array('idmarca'=>$value)));
			}

			$this->em->merge($microsite);
			$this->em->flush();
			return true;
		}else{
			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$data['nombre'] = $aux['it'];
			// print_r($data['nombre']);
			// exit;
			$galeria =__DIR__."/../../public/uploads/".clearStr($data['nombre']).'/galeria/'; 
			$principal =__DIR__."/../../public/uploads/".clearStr($data['nombre']).'/main/'; 
			$logo =__DIR__."/../../public/uploads/".clearStr($data['nombre']).'/logo/'; 
			if(!file_exists($galeria))
				mkdir($galeria, 0777,true);
			if(!file_exists($principal))
				mkdir($principal, 0777,true);
			if(!file_exists($logo))
				mkdir($logo, 0777,true);
			// $extension = 			
			
			// PRINCIPAL


			// $nameP = $principal.md5(clearStr($data['nombre']));
			// move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
			// unset($_FILES['imagePrincipal']);
			$nameAA = array();
			foreach ($_FILES as $key => $value) {
				if(strpos($key,'imagePrincipal') !== FALSE){
					// print_r( $value['tmp_name'] );
					$file_tmp =$value['tmp_name'];
					move_uploaded_file($file_tmp,$principal.md5($key.'-'.clearStr($data['nombre'])));
					$nameAA[] =md5($key.'-'.clearStr($data['nombre']));
					unset($_FILES[$key]);
				}
			}
			// print_r($nameAA);
			// print_r($_FILES);
			// print_r(implode(',',$nameAA));
			// exit;

			// print_r($nameP);
			// print_r($_FILES);
			// exit;
			// LOGO
			$nameP = $logo.md5(clearStr($data['nombre']));
			move_uploaded_file($_FILES['logo']['tmp_name'],$nameP);
			unset($_FILES['logo']);

			$nameP = $logo.md5(clearStr($data['nombre'].'-gris'));
			move_uploaded_file($_FILES['logogris']['tmp_name'],$nameP);
			unset($_FILES['logogris']);

			// GALERIA
			$nameGal = array();
			foreach ($_FILES as $key => $value) {
				$file_tmp =$value['tmp_name'];
				move_uploaded_file($file_tmp,$galeria.md5($key.'-'.clearStr($data['nombre'])));
				$nameGal[] =md5($key.'-'.clearStr($data['nombre']));
			}
			if(!isset($data['categoria'])){
				$data['categoria']=array();
			}
			if(!isset($data['marcas'])){
				$data['marcas']=array();
			}
			if(!isset($data['subcategoria'])){
				$data['subcategoria']=array();
			}

			$mezcladito = array_merge($data['categoria'],$data['subcategoria']);
			$microsite->setIduser($this->em->getRepository('User')->findOneBy(array('iduser'=>$data['userMicrosite'])));
			


			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$microsite->setNombre(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['descripcion-'.$r->letras];
			}
			$microsite->setDescripcion(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['apertura-'.$r->letras];
			}
			$microsite->setApertura(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['cierre-'.$r->letras];
			}
			$microsite->setCierre(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['title-'.$r->letras];
			}
			$microsite->setTitle(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['url-'.$r->letras];
			}
			$microsite->setUrl(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['description-'.$r->letras];
			}
			$microsite->setDescription(json_encode($aux));





			$microsite->setLogoprincipal(implode(',',$nameAA))
			->setLogo(clearStr($data['nombre']))
			->setFacebook($data['facebook'])
			->setGoogle($data['google'])
			->setTwitter($data['twitter'])
			->setLinkedin($data['linkedin'])
			->setPinterest($data['pinterest'])
			->setInstagram($data['instagram'])
			->setLogogris(clearStr($data['nombre'].'-gris'))
			->setImagenslider(implode(',',$nameGal))
			->setDireccion($data['direccion'])
			->setRuta($data['ruta'])
			->setPuntogoogle($data['Lat'].','.$data['Long'])
			->setPagina($data['website'])
			->setTelefono($data['telefono'])
			->setEmail($data['email'])
			->setIdioma('es')
			->setIdbase('0')
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'));
			foreach ($mezcladito as $key => $value) {
				$microsite->addCategoriafk($this->em->getRepository('Categoria')->findOneBy(array('idcategoria'=>$value)));
			}
			foreach ($data['marcas'] as $key => $value) {
				$microsite->addIdmarca($this->em->getRepository('Marca')->findOneBy(array('idmarca'=>$value)));
			}


			// print_r($microsite->getLogo)
			$this->em->persist($microsite);
			$this->em->flush();
		}
		return true;
	}
	

}

