<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once __DIR__.'/Entities/User.php';
include_once __DIR__.'/Entities/Evento.php';
include_once __DIR__.'/Entities/Marca.php';
include_once __DIR__.'/Entities/Microsite.php';
include_once __DIR__.'/Entities/Oferta.php';
class Register extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->em = $this->doctrine->em;
		$this->bd = $this->doctrine->em->getRepository('User');
	}
	public function getUserByEmail($email){
		$user = $this->em->getRepository("User")->findOneBy(array("email" => $email));
		return $user;
	}
	public function checkLogin($datos){
		$user = $this->em->getRepository('User')->findOneBy(array("email"=>$datos['email'],'password'=>md5($datos['passoword'])));
		return $user;
	}
	public function edit(){
		
	}
	public function saveM($data){
		$user = new User;
		if(file_exists(__DIR__.'/../../public/uploads/'.md5($data['email']))){
			$user->setFoto(md5($data['email']));
		}
		$user->setUsername($data['username']);
		$user->setEmail($data['email']);
		$user->setPassword(md5($data['password']));
		$user->setCreado(Date('Y-m-d H:i:s'));
		$user->setNivelusuario(0);
		$user->setEstatus(1);
		$this->em->persist($user);
		$this->em->flush();
		return $user->getIduser();
	}
	public function save($data,$type=0) {
		$user = new User;
		// echo __DIR__.'/../../public/uploads/'.md5($data['email']);
		if(file_exists(__DIR__.'/../../public/uploads/'.md5($data['email']))){
			$user->setFoto(md5($data['email']));
			// echo 'rata';
		}
		if(isset($data['iduser'])){
			$user = $this->bd->findOneBy(array('iduser'=>$data['iduser']));
			$user->setUsername($data['username']);
			$user->setEmail($data['email']);
			$user->setPassword(md5($data['password']));
			$this->em->merge($user);
			$this->em->flush();
		}else{
			// $user->setNombre($data['nombre']);
			$user->setUsername($data['username']);
			$user->setEmail($data['email']);
			$user->setPassword(md5($data['password']));
			$user->setCreado(Date('Y-m-d H:i:s'));
			$user->setNivelusuario($type);
			$user->setEstatus(1);
			// print_r($user);
			// exit;
			$this->em->persist($user);
			$this->em->flush();
		}
		return TRUE;
	}
	

}

