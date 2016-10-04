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
		return $r;
	}
	public function getAll(){
		$categoria = $this->bd->findAll();
		return $categoria;
	}
	public function getMicroByUser(){
		$microsite = $this->em->getRepository('Microsite')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser()));
		return array('id'=>$microsite->getIdmicrosite(),'microsite'=>$microsite->getNombre());	
	}
	public function getUserpaquetes(){

		$query = $this->db->query("SELECT u.iduser,u.nivelusuario,m.idmicrosite,m.nombre from user u JOIN microsite m ON m.iduser = u.iduser JOIN categoriaMicrosite cm ON cm.micrositefk = m.idmicrosite WHERE cm.categoriafk = 3");
		$row=$query->result();
		return $row;
	}
	public function getAllByUser(){
		$microsite = $this->em->getRepository('Microsite')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser()));
		// print_r($microsite->getIdmicrosite());
		$ress = array();
		$res = $this->bd->findAll();
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
		$config = json_decode(file_get_contents(base_url().'public/js/site.config.json'));
		if(isset($data['idoferta'])){
			// $oferta = $this->em->getRepository('Oferta')->findOneBy(array('idoferta'=>$data['idoferta']));
			$oferta = $this->bd->findOneBy(array('idoferta'=>$data['idoferta']));
			if(isset($_FILES) && count($_FILES) > 0){
				$aux = array();
				for ($i=0; $i < count($config->idiomas); $i++) { 
					$r = $config->idiomas[$i];
					$aux[$r->letras] = $data['nombre-'.$r->letras];
				}
				$data['nombre'] = $aux['it'];

				$galeria =__DIR__."/../../public/uploads/ofertas/"; 
				mkdir($galeria, 0777,true);
				// print_r($_FILES['imagePrincipal']['tmp_name']);
				$nameP = $galeria.md5($data['nombre'].'0');
				move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
				$gridmovil = $galeria.md5($data['nombre'].'2');
				move_uploaded_file($_FILES['gridmovil']['tmp_name'],$gridmovil);
				$nameBody = $galeria.md5($data['nombre'].'1');
				move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
				$oferta->setImagengrid(md5($data['nombre'].'0'))
				->setGridmovil(md5($data['nombre'].'2'))
				->setImagenbody(md5($data['nombre'].'1'));
			}


			$micro = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$data['idmicrosite']));



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
				//print_r($aux);
			}
			$oferta->setUrl(json_encode($aux));

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
			$chafe=split('/', $ha[1]);
			$fich=$chafe[2].'-'.$chafe[0].'-'.$chafe[1];
			$ch2 = str_replace(' ', '', $fich);

			$cha = split('/', $ha[0]);
			$fech=$cha[2].'-'.$cha[0].'-'.$cha[1];
			$ch = str_replace(' ', '', $fech);

			$oferta->setIdmicrosite($micro)
			->setIdoferta($data['idoferta'])
			->setFechainicio($ch)
			->setFechafin($ch2)
			->setPorcentaje($data['porcentaje'])
			->setIdioma('es')
			->setIdbase('0')
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'))
			->setPaquete($data['paquete'] ? 1 : 0)
                                                ->setIsImmobiliare($data['isimmobiliare'] ? 1 : 0);
			// print_r($oferta);
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
			$galeria =__DIR__."/../../public/uploads/ofertas/"; 
			mkdir($galeria, 0777,true);
			// print_r($_FILES['imagePrincipal']['tmp_name']);
			$nameP = $galeria.md5($data['nombre'].'0');
			move_uploaded_file($_FILES['imagePrincipal']['tmp_name'],$nameP);
			$nameBody = $galeria.md5($data['nombre'].'1');
			move_uploaded_file($_FILES['galeria0']['tmp_name'],$nameBody);
			
			$gridmovil = $galeria.md5($data['nombre'].'2');
			move_uploaded_file($_FILES['gridmovil']['tmp_name'],$gridmovil);



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
				//print_r($aux);
			}

			$oferta->setUrl(json_encode($aux));

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
			$chafe=split('/', $ha[1]);
			$fich=$chafe[2].'-'.$chafe[0].'-'.$chafe[1];
			$ch2 = str_replace(' ', '', $fich);

			$cha = split('/', $ha[0]);
			$fech=$cha[2].'-'.$cha[0].'-'.$cha[1];
			$ch = str_replace(' ', '', $fech);


			$micro = $this->em->getRepository('Microsite')->findOneBy(array('idmicrosite'=>$data['idmicrosite']));
			$oferta->setIdmicrosite($micro)
			->setFechainicio($ch)
			->setFechafin($ch2)
			->setImagengrid(md5($data['nombre'].'0'))
			->setImagenbody(md5($data['nombre'].'1'))
			->setGridmovil(md5($data['nombre'].'2'))
			->setPorcentaje($data['porcentaje'])
			->setIdioma('es')
			->setIdbase('0')
			->setPredeterminado('1')
			->setEstatus($data['estatus'])/*$data['estatus'])*/
			->setCreado(Date('Y-m-d H:i:s'))
			->setPaquete($data['paquete'] ? 1 : 0)
                                                ->setIsImmobiliare($data['isimmobiliare'] ? 1 : 0);
			$this->em->persist($oferta);
			$this->em->flush();
		}
		return true;
	}
	

}

