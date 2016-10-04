<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ban extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelBanner');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('banners'=> $this->ModelBanner->getAll());
		$this->load->view('allBanner',$data);
	}
	public function borrar($id){
		if( $this->ModelBanner->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'banner/categorias');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	public function edit($id){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelBanner->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'banner/categorias');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'categoria'=>$this->ModelBanner->getCategoria($id),
				'padre'=>$this->ModelBanner->getPadre($id)
				);
			$this->load->view('editCategoria',$data);
		}
	}
	public function add(){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelBanner->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'banner/categorias');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'categorias'=>$this->ModelBanner->getPadres()
				);
			$this->load->view('addCategoria',$data);
		}
	}

}
