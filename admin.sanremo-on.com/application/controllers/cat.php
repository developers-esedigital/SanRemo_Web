<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cat extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('Modelcategoria');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('exp'=> $this->em->getRepository('Experiencia')->findAll() );
		$this->load->view('allExp',$data);
	}
	public function borrar($id){
		if( $this->Modelcategoria->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'admin/categorias');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
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
				'padre'=>$this->Modelcategoria->getPadre($id),
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
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
				'categorias'=>$this->Modelcategoria->getPadres(),
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
				);
			$this->load->view('addCategoria',$data);
		}
	}

}
