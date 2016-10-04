<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once __DIR__.'/Entities/Categoria.php';
include_once __DIR__.'/Entities/Marca.php';
include_once __DIR__.'/Entities/Evento.php';
include_once __DIR__.'/Entities/Microsite.php';
include_once __DIR__.'/Entities/Oferta.php';
include_once __DIR__.'/Entities/User.php';
include_once __DIR__.'/Entities/Banner.php';
include_once __DIR__.'/Entities/Servicio.php';
include_once __DIR__.'/Entities/Slider.php';
//include_once __DIR__.'/Entities/Texto.php';
class ModelTexto extends CI_Model {
	function __construct(){
		parent::__construct();
		// $this->bd = $this->doctrine->em->getRepository('Slider');
		// $this->em = $this->doctrine->em;

	}
	public function get($id){
		$query = $this->db->query("SELECT * FROM texto WHERE idtexto =".$id);
		$r = $query->result();
		return $r;
	}
	public function getAll(){
		// $categoria = $this->bd->findAll();
		$query = $this->db->query("SELECT * FROM texto");
		$categoria = $query->result();
		return $categoria;
	}
	public function delete($id){
		// $exp = $this->bd->findOneBy(array('idtexto'=>$id));
		// $this->em->remove($exp);
  //   	$this->em->flush();
		$query = $this->db->delete('texto', array('idtexto' => $id)); 
    	return true;
	}
	public function save($data){
		//$oferta = new Texto();
		if(isset($data['idtexto'])){
			// $oferta->setTitulo($data['titulo']);
			// $oferta->setTboton($data['tboton']);
			// $oferta->setTurl($data['turl']);
			// $oferta->setEstatus(isset($data['estatus']) ? 1 : 0);

			// //$oferta->setUrl(isset($data['url']) ? $data['url'] : '');
			// $this->em->merge($oferta);
			// $this->em->flush();
			$datos = array(
			               'titulo' => $data['titulo'],
			               'tboton' => $data['tboton'],
			               'turl' => $data['turl'],
			               'estatus'=> isset($data['estatus']) ? 1 : 0
			            );

			$this->db->where('idtexto', $data['idtexto']);
			$this->db->update('texto', $datos);
		}else{
			// $oferta->setTitulo($data['titulo']);
			// $oferta->setTboton($data['tboton']);
			// $oferta->setTurl($data['turl']);
			// $oferta->setEstatus(isset($data['estatusSlider']) ? 1 : 0);
			

			// $this->em->persist($oferta);
			// $this->em->flush();

			$datos = array(
			               'titulo' => $data['titulo'],
			               'tboton' => $data['tboton'],
			               'turl' => $data['turl'],
			               'estatus'=> isset($data['estatus']) ? 1 : 0
			            );

			$this->db->insert('texto', $datos); 
		}
		return true;
	}
	

}

