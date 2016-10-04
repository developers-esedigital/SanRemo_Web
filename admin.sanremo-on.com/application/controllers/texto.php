<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Texto extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelTexto');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('sliders'=> $this->ModelTexto->getAll());
		$this->load->view('allTextoSlider',$data);
	}
	public function borrar($id){
		if( $this->ModelTexto->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'admin');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	public function edit($id){
		if ( $this->input->post('registro') == '1') {
			if( $this->ModelTexto->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url());
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'slider'=>$this->ModelTexto->get($id)
				);
			$this->load->view('editTextoSlider',$data);
		}
	}
	public function add(){
		if ( $this->input->post('registro') == '1') {
			if( $this->ModelTexto->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				// 'categorias'=>$this->ModelBanner->getPadres()
				);
			$this->load->view('addTextoSlider',$data);
		}
	}

}
