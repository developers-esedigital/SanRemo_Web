<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');
class Services extends REST_Controller {
	public function microsite_get(){
		// $this->load->model('ModelMicrosite');
		// $id = $this->get('id');
		// $res = $this->ModelMicrosite->get($id);
		// if($res != null)
		// 	$response = array(
		// 		'code'=>200,
		// 		'msg'=>'Exito',
		// 		'respuesta'=>$res
		// 	);
		// else
		// 	$response = array(
		// 		'code'=>404,
		// 		'msg'=>'NO ENCONTRADO'
		// 	);
		// $this->response($response,200);
		$data = array('returned: '. $this->get('id'));
        $this->response($data,200);
	}
	function user_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        // $user = $this->some_model->getSomething( $this->get('id') );
    	$users = array(
			1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
			2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
		);
		
    	$user = @$users[$this->get('id')];
    	
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }
}
