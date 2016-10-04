<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gall extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelGallery');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('gallerys'=> $this->ModelGallery->getAll());
		$this->load->view('allGallery',$data);
	}
	public function borrar($id){
		if( $this->ModelGallery->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'admin');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	public function edit($id){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelGallery->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'gallery'=>$this->ModelGallery->get($id)
				);
			$this->load->view('editGallery',$data);
		}
	}
	public function add(){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelGallery->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				// 'categorias'=>$this->ModelBanner->getPadres()
				);
			$this->load->view('addGallery',$data);
		}
	}

}
