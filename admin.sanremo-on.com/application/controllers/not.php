<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Not extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelNoticias');
		$this->load->model('ModelMicrosite');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('Noticias'=>$this->ModelNoticias->getAll(),'micro'=>$this->ModelMicrosite->getCatalogo());
		// var_dump($data);
		$this->load->view('allNoticias',$data);
	}
	public function index_micro(){
		$data = array('Noticias'=>$this->ModelNoticias->getAllByUser(),'micro'=>$this->ModelMicrosite->getCatalogo(),'micros'=>1);
		$this->load->view('allNoticias',$data);
	}

	public function borrar($id,$rr = 0){
		if( $this->ModelNoticias->delete($id) ){
			if($rr == 0)
				$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'not');
			else
				$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'not/index_micro');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	public function edit($id,$rr =0){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelNoticias->save($this->input->post())){
				if($rr == 0){
					if($this->input->post('estatus') == '-1'){
					$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'not','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'not');
					}
				}
					// $res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'not');
				else
					if($this->input->post('estatus') == '-1'){
					$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'not','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'not/index_micro');
					}
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'noticia'=>$this->ModelNoticias->get($id),
				'microsite'=>$this->ModelMicrosite->getCatalogo(),
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
				// 'padre'=>$this->Modelcategoria->getPadre($id)
				);
			$data['post'] = $rr == 0 ? base_url().'not/edit/'.$id : base_url().'not/edit/'.$id.'/1';
			$data['no'] = 0;
			$this->load->view('editNoticias',$data);
		}
	}
	public function add($rr = 0){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelNoticias->save($this->input->post())){
				if($rr == 0)
					if($this->input->post('estatus') == '-1'){
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'not','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'not');
					}
				else
					if($this->input->post('estatus') == '-1'){
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'not','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'not/index_micro');
					}
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'microsites'=>$this->ModelMicrosite->getAll(),
				'post'=>'not/add',
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
				);
			$data['post'] = $rr == 0 ? base_url().'not/add/' : base_url().'not/add/1';
			if($rr != 0){
				$data['no'] = 0;
				$data['idmicrosite'] = $this->ModelNoticias->getMicroByUser();
			}
			$this->load->view('addNoticias',$data);
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
				'post'=>'ofer/add',
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
				);
			$this->load->view('addOfertas',$data);
		}
	}

}
