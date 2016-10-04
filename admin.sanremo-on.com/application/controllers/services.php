<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require(APPPATH.'libraries/REST_Controller.php');

class Services extends REST_Controller {
	function __construct(){
		// parent::__construct();
	}
	public function microsites_get(){
		$this->load->model('ModelMicrosite');
		$id = $this->get('id');
		$res = $this->ModelMicrosite->get($id);
		if($res != null)
			$response = array(
				'code'=>200,
				'msg'=>'Exito',
				'respuesta'=>$res
			);
		else
			$response = array(
				'code'=>404,
				'msg'=>'NO ENCONTRADO'
			);
		$this->response($response,200);
	}
}
