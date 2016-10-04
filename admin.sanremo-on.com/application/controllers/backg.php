<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backg extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelFondo');
		
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('backg'=> $this->ModelFondo->getAll());
		$this->load->view('allBackg',$data);
	}
	public function borrar($id){
		if( $this->ModelFondo->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'/backg');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	public function edit($id){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			
			
			
			if( $this->ModelFondo->save($this->input->post())){
				
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'backg');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
	
			$data = array(
				'backg'=>$this->ModelFondo->get($id)
				);
			$this->load->view('editBackg',$data);
		}
	}
	

	public function add2(){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			//print_r('sientro');
			//print_r($this->input->post());
			console.log_message('error',$this->input->post());
			if( $this->ModelFondo->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url());
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				// 'categorias'=>$this->ModelBanner->getPadres()
				);
			//print_r('noentro');
			$this->load->view('addBackg',$data);
		}
	}

}
