<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(0);
// use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\DBAL\DriverManager;
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
	public function addFavorito($user,$micro){
		$query = "insert into favorito values(".$user.",".$micro.")";
		$statement = $this->em->getConnection();
		$results = $statement->query($query);
	}
	public function removeFavorito($user,$micro){
		$query = "delete from favorito where user=".$user." and microsite=".$micro;
		$statement = $this->em->getConnection();
		$results = $statement->query($query);
	}
	public function get($idMicro){
		$r = $this->bd->findOneBy(array('idmicrosite'=>$idMicro));
		$statement = $this->em->getConnection();
		$results = $statement->query("SELECT t.micrositefk,t.categoriafk FROM categoriaMicrosite t where t.micrositefk ='".$r->getIdmicrosite()."'");  
		$r->setCategoriafk($results->fetchAll());
		return $r;
	}
	public function getNews($idMicro){
		$query = "select idnoticia,nombre,fechaInicio,imagenGrid from noticia where microsite=".$idMicro." order by fechaInicio desc limit 10";
		$statement = $this->em->getConnection();
		$results = $statement->query($query);
		$r = $results->fetchAll();
		return $r;
	}
	public function getByUrl($url){
		$todos = $this->bd->findAll();
		foreach ($todos as $key => $value) {
			$urls = (array)json_decode($value->getUrl());
			foreach ($urls as $k => $v) {
				if($v == $url){
					$statement = $this->em->getConnection();
					$results = $statement->query("SELECT t.micrositefk,t.categoriafk FROM categoriaMicrosite t where t.micrositefk ='".$value->getIdmicrosite()."'");  
					$value->setCategoriafk($results->fetchAll());
					return $value;
				}
			}
		}
		// return $this->bd->findOneBy(array('url'=>$url));	
	}
	public function getCatalogo(){
		$categoria = $this->bd->findAll();
		$res = array();
		foreach ($categoria as $key => $value) {
			$res[$value->getIdmicrosite()] = $value->getNombre();

		}
		
		return $res;
	}
	public function isFavorito($user,$micro){
		$query = "select count(*) si from favorito where user=".$user." and microsite=".$micro;
		$statement = $this->em->getConnection();
		$results = $statement->query($query);
		$r = $results->fetch();
		return $r['si'];
	}
	public function getMarcaCategoria($idMarca,$idCategoria){
			// explode(delimiter, string)
			// if( explode('-',$idMarca) )
			$query = "
			SELECT 
			    DISTINCT micro.`idmicrosite`,
			    micro.`iduser`,
			    micro.`nombre`,
			    micro.`logoPrincipal`,
			    micro.`imagenSlider`,
			    micro.`direccion`,
			    micro.`puntoGoogle`,
			    micro.`pagina`,
			    micro.`telefono`,
			    micro.`email`,
			    micro.`descripcion`,
			    micro.`idioma`,
			    micro.`idbase`,
			    micro.`predeterminado`,
			    micro.`estatus`,
			    micro.`creado`,
			    micro.`description`,
			    micro.`title`,
			    micro.`logo`,
			    micro.`apertura`,
			    micro.`cierre`,
			    micro.`logogris`,
			    micro.`url`,
			    micro.`facebook`,
				micro.`twitter`,
				micro.`google`,
				micro.`linkedin`,
				micro.`pinterest`,
				micro.`instagram`,
				micro.`micrositecol`,
				micro.`micrositecol1`,
				micro.`micrositecol2`,
				micro.`micrositecol3`,
				micro.`micrositecol4`,
				micro.`micrositecol5`,
				micro.`micrositecol6`,
				micro.`micrositecol7`,
				micro.`micrositecol8`,
				micro.`micrositecol9`,
			    ( select categoriaMicrosite.categoriafk from sanremoon.categoriaMicrosite where categoriaMicrosite.micrositefk = micro.idmicrosite limit 1) categoria
			from `microsite` micro
			inner join micrositeMarca msM
			on micro.idmicrosite=msM.idmicrosite
			inner join categoriaMicrosite cMs
			on micro.idmicrosite=cMs.micrositefk
			where micro.estatus = 1 and cMs.categoriafk = ".$idCategoria." and msM.idmarca in (".str_replace('-',',',$idMarca).")";
			$statement = $this->em->getConnection();
			$results = $statement->query($query);
			return $results->fetchAll();
			
	}
	public function getCat($idCategoria){
		$query = "
			SELECT 
			    micro.`idmicrosite`,
			    micro.`iduser`,
			    micro.`nombre`,
			    micro.`logoPrincipal`,
			    micro.`imagenSlider`,
			    micro.`direccion`,
			    micro.`puntoGoogle`,
			    micro.`pagina`,
			    micro.`telefono`,
			    micro.`email`,
			    micro.`descripcion`,
			    micro.`idioma`,
			    micro.`idbase`,
			    micro.`predeterminado`,
			    micro.`estatus`,
			    micro.`creado`,
			    micro.`description`,
			    micro.`title`,
			    micro.`logo`,
			    micro.`apertura`,
			    micro.`logogris`,
			    micro.`cierre`,
			    micro.`url`,
			    micro.`facebook`,
				micro.`twitter`,
				micro.`google`,
				micro.`linkedin`,
				micro.`pinterest`,
				micro.`instagram`,
				micro.`micrositecol`,
				micro.`micrositecol1`,
				micro.`micrositecol2`,
				micro.`micrositecol3`,
				micro.`micrositecol4`,
				micro.`micrositecol5`,
				micro.`micrositecol6`,
				micro.`micrositecol7`,
				micro.`micrositecol8`,
				micro.`micrositecol9`,
			    ( select categoriaMicrosite.categoriafk from sanremoon.categoriaMicrosite where categoriaMicrosite.micrositefk = micro.idmicrosite limit 1) categoria
			from `microsite` micro
			inner join categoriaMicrosite cMs
			on micro.idmicrosite=cMs.micrositefk
			inner join categoria cat
			on cMs.categoriafk=cat.idcategoria
			where micro.estatus = 1 and cat.idcategoria = ".$idCategoria;
			$statement = $this->em->getConnection();
			$results = $statement->query($query);
			return $results->fetchAll();
	}
	public function getCatSubcat($idCategoria,$idSub){
		$query = "
			SELECT 
			    DISTINCT micro.`idmicrosite`,
			    micro.`iduser`,
			    micro.`nombre`,
			    micro.`logoPrincipal`,
			    micro.`imagenSlider`,
			    micro.`direccion`,
			    micro.`puntoGoogle`,
			    micro.`pagina`,
			    micro.`telefono`,
			    micro.`email`,
			    micro.`descripcion`,
			    micro.`idioma`,
			    micro.`idbase`,
			    micro.`predeterminado`,
			    micro.`estatus`,
			    micro.`creado`,
			    micro.`description`,
			    micro.`title`,
			    micro.`logo`,
			    micro.`apertura`,
			    micro.`logogris`,
			    micro.`cierre`,
			    micro.`url`,
			    micro.`facebook`,
				micro.`twitter`,
				micro.`google`,
				micro.`linkedin`,
				micro.`pinterest`,
				micro.`instagram`,
				micro.`micrositecol`,
				micro.`micrositecol1`,
				micro.`micrositecol2`,
				micro.`micrositecol3`,
				micro.`micrositecol4`,
				micro.`micrositecol5`,
				micro.`micrositecol6`,
				micro.`micrositecol7`,
				micro.`micrositecol8`,
				micro.`micrositecol9`,
			    ( select categoriaMicrosite.categoriafk from sanremoon.categoriaMicrosite where categoriaMicrosite.micrositefk = micro.idmicrosite limit 1) categoria
			from `microsite` micro
			inner join categoriaMicrosite cMs
			on micro.idmicrosite=cMs.micrositefk
			inner join categoria cat
			on cMs.categoriafk=cat.idcategoria
			where micro.estatus = 1 and cat.parent = ".$idCategoria." and cMs.categoriafk in (".str_replace('-',',',$idSub).")";
			$statement = $this->em->getConnection();
			$results = $statement->query($query);
			return $results->fetchAll();
	}
	public function getFavoritos($user){
		$query = "
			SELECT 
			    micro.`idmicrosite`,
			    micro.`iduser`,
			    micro.`nombre`,
			    micro.`logoPrincipal`,
			    micro.`imagenSlider`,
			    micro.`direccion`,
			    micro.`puntoGoogle`,
			    micro.`pagina`,
			    micro.`telefono`,
			    micro.`email`,
			    micro.`descripcion`,
			    micro.`idioma`,
			    micro.`idbase`,
			    micro.`predeterminado`,
			    micro.`estatus`,
			    micro.`creado`,
			    micro.`description`,
			    micro.`title`,
			    micro.`logo`,
			    micro.`apertura`,
			    micro.`logogris`,
			    micro.`cierre`,
			    micro.`url`,
			    micro.`facebook`,
				micro.`twitter`,
				micro.`google`,
				micro.`linkedin`,
				micro.`pinterest`,
				micro.`instagram`,
				micro.`micrositecol`,
				micro.`micrositecol1`,
				micro.`micrositecol2`,
				micro.`micrositecol3`,
				micro.`micrositecol4`,
				micro.`micrositecol5`,
				micro.`micrositecol6`,
				micro.`micrositecol7`,
				micro.`micrositecol8`,
				micro.`micrositecol9`,
			    ( select categoriaMicrosite.categoriafk from sanremoon.categoriaMicrosite where categoriaMicrosite.micrositefk = micro.idmicrosite limit 1) categoria
			from `microsite` micro
			inner join favorito fav
            on micro.idmicrosite = fav.microsite
			where micro.estatus = 1 and fav.user =".$user;
			$statement = $this->em->getConnection();
			$results = $statement->query($query);
			return $results->fetchAll();
	}
	public function getAll(){
		$categoria = $this->bd->findBy(array('estatus' => '1'));
		$res = array();
		foreach ($categoria as $key => $value) {
			// $rsm = new ResultSetMapping();
			// $rsm->addFieldResult('t','micrositefk','micrositefk');
			// $rsm->addFieldResult('t','categoriafk','categoriafk');

			$statement = $this->em->getConnection();
			$results = $statement->query("SELECT t.micrositefk,t.categoriafk FROM categoriaMicrosite t where t.micrositefk ='".$value->getIdmicrosite()."'");  
			// print_r($results->fetchAll());

			// $query = $this->em->createNativeQuery('SELECT t.micrositefk,t.categoriafk FROM categoriaMicrosite t', $rsm);
			// echo $value->getIdmicrosite();
			// $query->setParameter(1,$value->getIdmicrosite());
			// print_r($query->getResult());
			// $users = $query->getResult();
			// $value->setCategoriafk($r);
			// $categorias = $this->em->getRepository('Categoria')->find(array('idmicrosite'=>$value->getIdmicrosite()));
			$value->setCategoriafk($results->fetchAll());
		}
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

