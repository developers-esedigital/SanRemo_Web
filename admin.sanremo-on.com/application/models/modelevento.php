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
	public function getMicroByUser(){
		// $microsite = $this->em->getRepository('Microsite')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser()));
		// return array('id'=>$microsite->getIdmicrosite(),'microsite'=>$microsite->getNombre());

		$query = $this->db->query("SELECT idmicrosite FROM microsite WHERE iduser =".$_SESSION['usuario']->getIduser());
		return $query->result();
	}
	public function getAllByUser(){
	
		$ress = array();
		//print_r($_SESSION['usuario']->getIduser());
		$query = $this->db->query("SELECT * FROM evento WHERE iduser =".$_SESSION['usuario']->getIduser());
		//print_r($query->result_array());
		return $query->result();
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
		$config = json_decode(file_get_contents(base_url().'public/js/site.config.json'));
		$oferta = new Evento();
		// var_dump($_FILES);
		// exit;
		if(isset($data['idevento'])){
                                               
			$oferta = $this->bd->findOneBy(array('idevento'=>$data['idevento']));

			if(isset($_FILES) && count($_FILES) > 0){
				$aux = array();
				for ($i=0; $i < count($config->idiomas); $i++) { 
					$r = $config->idiomas[$i];
					$aux[$r->letras] = $data['nombre-'.$r->letras];
				}
				$data['nombre'] = $aux['it'];
				$galeria =__DIR__."/../../public/uploads/evento/"; 
				mkdir($galeria, 0777,true);
				// print_r($_FILES['imagePrincipal']['tmp_name']);
				$nameP = $galeria.md5($data['nombre'].'0');
				move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
				$nameBody = $galeria.md5($data['nombre'].'1');
				move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
				$oferta->setFotogrid(md5($data['nombre'].'0'))
				->setFotobody(md5($data['nombre'].'1'));
			}
			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$oferta->setNombre(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['descripcion-'.$r->letras];
			}
			$oferta->setDescripcion(json_encode($aux));



			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['url-'.$r->letras];
			}
			$oferta->setUrl(json_encode($aux));

			//Direccion
			
			//$oferta->setDir(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['description-'.$r->letras];
			}
			$oferta->setDescription(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['title-'.$r->letras];
			}
			$oferta->setTitle(json_encode($aux));

			$fe=$data['rango'];
			$ha=split('-', $fe);
			$cha = split('/', $ha[0]);
			$fech=$cha[2].'-'.$cha[0].'-'.$cha[1];
			$ch = str_replace(' ', '', $fech);

			$oferta->setFechainicio($ch)
			->setFechafin($data['rango'])
			->setPuntogoogle($data['Lat'].','.$data['Long'])
			->setIdioma('es')
			->setIdbase('0')
			->setPredeterminado('1')
			->setIduser($data['idus'])
			->setIdmicrosite($data['idmicro'])
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'))
			->setDir($data['dir']);
			 //print_r(json_encode($oferta));
			// exit;
			$this->em->merge($oferta);
			$this->em->flush();
		}else{
			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$data['nombre'] = $aux['it'];
			$galeria =__DIR__."/../../public/uploads/evento/"; 
			mkdir($galeria, 0777,true);
			// print_r($_FILES['imagePrincipal']['tmp_name']);
			$nameP = $galeria.md5($data['nombre'].'0');
			move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
			$nameBody = $galeria.md5($data['nombre'].'1');
			move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
						

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['nombre-'.$r->letras];
			}
			$oferta->setNombre(json_encode($aux));


			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['descripcion-'.$r->letras];
			}
			$oferta->setDescripcion(json_encode($aux));


			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['url-'.$r->letras];
			}
			$oferta->setUrl(json_encode($aux));

			$oferta->setDir(json_encode($aux));

		

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['description-'.$r->letras];
			}
			$oferta->setDescription(json_encode($aux));

			$aux = array();
			for ($i=0; $i < count($config->idiomas); $i++) { 
				$r = $config->idiomas[$i];
				$aux[$r->letras] = $data['title-'.$r->letras];
			}
			$oferta->setTitle(json_encode($aux));

			$fe=$data['rango'];
			$ha=split('-', $fe);
			$cha = split('/', $ha[0]);
			$fech=$cha[2].'-'.$cha[0].'-'.$cha[1];
			$ch = str_replace(' ', '', $fech);
                                                
                                                /* Added code to save micro site with evnet */
                                                $micro = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$data['idmicrosite']));
                                                 $oferta->setMicrosite($data['idmicrosite']);
                                                /* End By SIPL VC */
			$oferta->setFechainicio($ch)
			->setFechafin($data['rango'])
			->setPuntogoogle($data['Lat'].','.$data['Long'])
			->setFotogrid(md5($data['nombre'].'0'))
			->setFotobody(md5($data['nombre'].'1'))
			->setIdioma('es')
			->setIdbase('0')
			->setIduser($data['idus'])
			->setIdmicrosite($data['idmicro'])
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'))
			->setDir($data['dir']);
			// var_dump($oferta);
			// exit;
			$this->em->persist($oferta);
			$this->em->flush();
		}
		return true;
	}
	

}

