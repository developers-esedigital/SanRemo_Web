<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
class Micro extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('ModelMicrosite');
		$this->load->model('Modelcategoria');
		$this->load->model('Register');
		$this->load->model('ModelMarca');

		$this->em = $this->doctrine->em;
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	}

	public function index(){
		$data = array('microsites'=> $this->ModelMicrosite->getAll(),
		'categorias'=>$this->Modelcategoria->getPadres() );
		$this->load->view('allMicrosites',$data);
	}

	public function getHijos($idPadre){
		$res = $this->Modelcategoria->getHijos($idPadre);
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
	}
	public function borrar($id){
		if( $this->ModelMicrosite->delete($id) ){
			$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'micro');
		}else{
			$res = array('code'=>500,'msg'=>'Error al borrar, intente más tarde');	
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));	
	}
	public function edit($id){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->ModelMicrosite->save($this->input->post())){
				if($this->input->post('origen')){
					// $res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin/microsite_micro');
					if($this->input->post('estatus') == '-1'){
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'micro','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin/microsite_micro');
					}
				}else{
					if($this->input->post('estatus') == '-1'){
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'micro','prev'=>'si');
					}else{
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'micro');
					}
					
				}
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			// $res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'micro');
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'microsite'=>$this->ModelMicrosite->get($id),
				'padres'=>$this->Modelcategoria->getPadres(),
				'hijos'=>$this->Modelcategoria->getPadresHijos(),
				'hijo1'=>$this->Modelcategoria->getHijos(1),
				'hijo2'=>$this->Modelcategoria->getHijos(2),
				'hijo3'=>$this->Modelcategoria->getHijos(3),
				'hijo4'=>$this->Modelcategoria->getHijos(4),
				'hijo5'=>$this->Modelcategoria->getHijos(5),
				'marcas'=>$this->ModelMarca->getAll(),
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
				);
			$this->load->view('editMicrosite',$data);
		}
	}
	public function createUser(){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if(isset($_FILES['image'])){
				$errors= array();
				$file_name = $_FILES['image']['name'];
				$file_size =$_FILES['image']['size'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];   
				$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
				$extensions = array("jpeg","jpg","png"); 		
				if(in_array($file_ext,$extensions )=== false){
					$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size > 2097152){
					$errors[]='File size must be excately 2 MB';
				}				
				if(empty($errors)==true){
					move_uploaded_file($file_tmp,__DIR__."/../../public/uploads/".md5($this->input->post('email')));
				}
			}
			if( $newuser = $this->Register->saveM($this->input->post())){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'micro/add/'.$newuser,'newId'=>$newuser);
			}else{
				$res = array('code'=>500,'msg'=>print_r($errors,true));	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$this->load->view('register');
		}
	}
	public function add($idUserMicrosite){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			// print_r($idUserMicrosite);
			// exit;
			if( $this->ModelMicrosite->save($this->input->post())){
				if($this->input->post('estatus') == '-1'){
					$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'micro','prev'=>'si');
				}else{
					$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'micro');
					
				}
			}else{
				$res = array('code'=>500,'msg'=>'Error al crear, intente más tarde');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array(
				'padres'=>$this->Modelcategoria->getPadres(),
				'hijos'=>$this->Modelcategoria->getPadresHijos(),
				'hijo1'=>$this->Modelcategoria->getHijos(1),
				'hijo2'=>$this->Modelcategoria->getHijos(2),
				'hijo3'=>$this->Modelcategoria->getHijos(3),
				'hijo4'=>$this->Modelcategoria->getHijos(4),
				'hijo5'=>$this->Modelcategoria->getHijos(5),
				'user'=>$idUserMicrosite,
				'marcas'=>$this->ModelMarca->getAll(),
				'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
				);
			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			$this->load->view('addMicrosite',$data);
		}
	}
}