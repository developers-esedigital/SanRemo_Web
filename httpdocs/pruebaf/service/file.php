<?php
// error_reporting( E_ALL );
// ini_set('display_errors', 1);
// header('Content-Type: application/json');
session_start();
// unset($_SESSION['usuario']);
// exit;
switch ($_GET['method']) {
	case 'login':
		$url = 'http://services.sanremo-on.com/service/login/format/json';
		extract($_POST);
		$fields = array(
			'email' => $user,
			'password' => urlencode($password)
		);
		$fields_string = '';
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		$fields_string = substr($fields_string,0,strlen($fields_string)-1);
		// echo $fields_string;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: application/json')); 
		curl_setopt($ch,CURLOPT_VERBOSE, true);
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result);
		if($result->code == 500){
			echo json_encode(array('code'=>500));
		}else{
			$_SESSION = array('usuario'=>$result->usuario);
			$res = array('code'=>200,'msg'=>'Login Exitoso','usuario'=>$result->usuario);
			echo json_encode($res);
		}
		break;
	case 'getLogin':
		// var_dump($_SESSION);
		if(isset($_SESSION['usuario'])){
			echo json_encode($_SESSION['usuario']);
		}else{
			echo json_encode(array('msg'=>'No esta logueado','code'=>600));
		}
		break;
	case 'logout':
		unset($_SESSION['usuario']);
		echo json_encode(array('code'=>200,'msg'=>'logout Exitoso.'));
		break;
}