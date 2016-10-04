<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ofer extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelOfertas');
		$this->load->model('ModelMicrosite');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('Ofertas'=>$this->ModelOfertas->getAll());
		$this->load->view('allOfertas',$data);
	}
	public function index_micro(){
		$data = array('Ofertas'=>$this->ModelOfertas->getAllByUser(),'micros'=>1);
		$this->load->view('allOfertas',$data);
	}

	public function borrar($id,$rr = 0){
		if( $this->ModelOfertas->delete($id) ){
			if($rr == 0)
				$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'ofer');
			else
				$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'ofer/index_micro');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	public function edit($id,$rr = 0){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelOfertas->save($this->input->post())){
				if($rr == 0)
					if($this->input->post('estatus') == '-1'){
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer');
					}
				else
					if($this->input->post('estatus') == '-1'){
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer/index_micro');
					}
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
			    'idAccomodation'=>$this->ModelOfertas->getUserpaquetes(),
				'oferta'=>$this->ModelOfertas->get($id),
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
				);

			$data['post'] = $rr == 0 ? base_url().'ofer/edit/'.$id : base_url().'ofer/edit/'.$id.'/1';
			$data['no'] = 0;
			$this->load->view('editOfertas',$data);
		}
	}
	public function add($rr = 0){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelOfertas->save($this->input->post())){
				if($rr == 0)
					if($this->input->post('estatus') == '-1'){
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer');
					}
				else
					if($this->input->post('estatus') == '-1'){
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer/index_micro');
					}
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{

			$data = array(
			    'idAccomodation'=>$this->ModelOfertas->getUserpaquetes(),
				'microsites'=>$this->ModelMicrosite->getAll(),
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
				);
			$data['post'] =  $rr == 0 ?  base_url().'ofer/add' : base_url().'ofer/add/1';
			if($rr != 0){
				$data['no'] = 0;
				$data['idmicrosite'] = $this->ModelOfertas->getMicroByUser();
			}
			$this->load->view('addOfertas',$data);
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
				'post'=>'ofer/add/1',
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
				);
			$this->load->view('addOfertas',$data);
		}
	}

}
