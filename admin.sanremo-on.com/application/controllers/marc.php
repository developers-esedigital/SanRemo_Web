<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marc extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelMarca');
		$this->load->model('ModelMicrosite');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('Marcas'=>$this->ModelMarca->getAll());
		// var_dump($data);
		$this->load->view('allMarcas',$data);
	}
	public function index_micro(){
		$data = array('Marcas'=>$this->ModelMarca->getAll(),'micro'=>$this->ModelMicrosite->getCatalogo());
		$this->load->view('allMarcas',$data);
	}

	public function borrar($id){
		if( $this->ModelMarca->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'marc');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	public function edit($id){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelMarca->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'marc');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'post'=>'marc/edit/'.$id,
				'marca'=>$this->ModelMarca->get($id)
				// 'padre'=>$this->Modelcategoria->getPadre($id)
				);
			$this->load->view('editMarca',$data);
		}
	}
	public function add(){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelMarca->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'marc');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'microsites'=>$this->ModelMicrosite->getAll(),
				'post'=>'marc/add'
				);
			$this->load->view('addMarca',$data);
		}
	}
	public function add_micro(){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelOfertas->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer/index_micro');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'microsites'=>$this->ModelMicrosite->getAll(),
				'post'=>'ofer/add'
				);
			$this->load->view('addOfertas',$data);
		}
	}

}
