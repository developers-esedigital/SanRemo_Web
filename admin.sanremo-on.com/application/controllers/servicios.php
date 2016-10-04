<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('Modelservicios');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('servicios'=> $this->Modelservicios->getAll() );
		$this->load->view('allServicio',$data);
	}
	public function borrar($id){
		if( $this->Modelservicios->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'servicios');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	public function edit($id){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->Modelservicios->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'servicios');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$rr = $this->Modelservicios->get($id);
			$data = array(
				'servicios'=>$rr[0],
				'post'=>base_url().'servicios/edit/'.$id
				);
			// echo '<pre>';
			// print_r($data);
			$this->load->view('editServicio',$data);
		}
	}
	public function add(){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->Modelservicios->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'servicios');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'post'=>base_url().'servicios/add'
				);
			$this->load->view('addServicio',$data);
		}
	}

}
