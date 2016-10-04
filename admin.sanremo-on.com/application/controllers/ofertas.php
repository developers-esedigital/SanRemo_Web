<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ofertas extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelOfertas');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('ofertas',$this->ModelOfertas->getAll());
		$this->load->view('allOfertas',$data);
	}
	public function index_micro(){

	}
	public function borrar($id){
		if( $this->Modelcategoria->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'admin');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		redirect('admin');
	}
	public function edit($id){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->Modelcategoria->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin/categorias');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'categoria'=>$this->Modelcategoria->getCategoria($id),
				'padre'=>$this->Modelcategoria->getPadre($id)
				);
			$this->load->view('editCategoria',$data);
		}
	}
	public function add(){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->Modelcategoria->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin/categorias');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'categorias'=>$this->Modelcategoria->getPadres()
				);
			$this->load->view('addCategoria',$data);
		}
	}

}
