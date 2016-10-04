<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class evt extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelEvento');
		$this->load->model('ModelMicrosite');
		$this->em = $this->doctrine->em;
	}

	public function index(){
		$data = array('Eventos'=>$this->ModelEvento->getAll(),'micro'=>$this->ModelMicrosite->getCatalogo());
		$this->load->view('allEventos',$data);
	}
	public function index_micro(){
		$data = array('Eventos'=>$this->ModelEvento->getAllByUser());
		$this->load->view('allEventos0',$data);
	}

	public function borrar($id){
		if( $this->ModelEvento->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'evt');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	public function edit($id,$rr = 0){
                	if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
                                	if( $this->ModelEvento->save($this->input->post())){
			
				if($this->input->post('estatus') == '-1'){
					$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'evt','prev'=>'si');
				}else{
					$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'evt');
                                        		}
				// $res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'evt');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'evento'=>$this->ModelEvento->get($id),
				'post'=>'evt/edit/'.$id,
                                                                'microsite'=>$this->ModelMicrosite->getCatalogo(),
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ),
				'idmicro'=>$this->ModelEvento->getMicroByUser()
				// 'padre'=>$this->Modelcategoria->getPadre($id)
				);
                                                $data['post'] = $rr == 0 ? base_url().'evt/edit/'.$id : base_url().'evt/edit/'.$id.'/1';
			$data['no'] = 0;
			$this->load->view('editEvento',$data);
		}
	}
	public function add(){
        		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
                                                if( $this->ModelEvento->save($this->input->post())){
				if($this->input->post('estatus') == '-1'){
					$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'evt','prev'=>'si');
				}else{
					$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'evt');
				}
			}else{ 
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
                    		$data = array(
				'microsites'=>$this->ModelMicrosite->getAll(),
				'post'=>'evt/add',
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) ,
				'idmicro'=>$this->ModelEvento->getMicroByUser()
				);
                                                /* Added code to set post url in event form */
                                                $data['post'] =  $rr == 0 ?  base_url().'evt/add' : base_url().'evt/add/1';
                        		/* Ended By SIPL VC 09-09-2016 */
                                                $this->load->view('addEvento',$data);
		}
	}
	public function add_micro(){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelEvento->save($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'ofer/index_micro');
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'microsites'=>$this->ModelMicrosite->getAll(),
				'post'=>'evt/add'
				);
			$this->load->view('addEvento',$data);
		}
	}

}
