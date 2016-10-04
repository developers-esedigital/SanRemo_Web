<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->model('register');
		$this->load->model('Modelcategoria');
		$this->load->model('Modelmicrosite');
		$this->load->model('ModelMarca');
		$this->em = $this->doctrine->em;
	}
	public function invitados(){
		$data = array();
		$this->load->view('allInvitados',$data);
	}
	public function editar($tipo,$iduser){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->register->save($this->input->post(),$tipo)){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin/config');
			}else{
				$res = array('code'=>500,'msg'=>print_r($errors,true));	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			// $h = array(-1=>'',0=>,1=>)
			$data = array('post'=>'admin/editar/'.$tipo.'/'.$iduser,
				'user'=>$this->em->getRepository('User')->findOneBy(array('iduser'=>$iduser)));
			$this->load->view('editUser',$data);
		}
	}
	public function addT1(){
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
			if( $this->register->save($this->input->post(),1)){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin/config');
			}else{
				$res = array('code'=>500,'msg'=>print_r($errors,true));	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array('post'=>'admin/addT1');
			$this->load->view('register2',$data);
		}
	}
	public function addT2(){
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
			if( $this->register->save($this->input->post(),-1)){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin/config');
			}else{
				$res = array('code'=>500,'msg'=>print_r($errors,true));	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$data = array('post'=>'admin/addT2');
			$this->load->view('register2',$data);
		}
	}
	public function config(){
		$data = array(
			'usuariosMicrosite'=>$this->em->getRepository('User')->findBy(array('nivelusuario'=>'0')),
			'usuariosAdmin'=>$this->em->getRepository('User')->findBy(array('nivelusuario'=>'1')),
			'usuariosInvitados'=>$this->em->getRepository('User')->findBy(array('nivelusuario'=>'-1'))
			);
		$this->load->view('config',$data);
	}
	public function all(){
		$data = array('usuarios'=> $this->em->getRepository('User')->findAll() );
		$this->load->view('allUser',$data);
	}
	public function borrar($id){
		$user = $this->em->getRepository('User')->findOneBy(array('iduser'=>$id));
		$this->em->remove($user);
    	$this->em->flush();
    	$res = array('code'=>200,'msg'=>'Borrado Exitoso','url'=>base_url().'admin/config');
    	$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// redirect('admin');
	}
	private function generarEntidadesDoctrine(){
		$this->em->getConfiguration()
		->setMetadataDriverImpl(
			new Doctrine\ORM\Mapping\Driver\DatabaseDriver(
				$this->em->getConnection()->getSchemaManager()
				)
			);

		$cmf = new Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
		$cmf->setEntityManager($this->em);
		$metadata = $cmf->getAllMetadata();     
		$generator = new Doctrine\ORM\Tools\EntityGenerator();

		$generator->setUpdateEntityIfExists(true);
		$generator->setGenerateStubMethods(true);
		$generator->setGenerateAnnotations(true);
		$generator->generate($metadata, APPPATH."models/Entities");
	}
	public function perfil(){
		$data = array('user'=> $this->em->getRepository("User")->findOneBy(array("email" => urldecode($_SESSION['usuario']->getEmail()))));
		// print_r($admin);
		$this->load->view('perfilusuario',$data);
	}
	public function index(){
		$data = array(
			'usuario'=>$_SESSION['usuario']
			);
		// print_r($data);
		// exit;
		$this->load->view('index2',$data);
	}
	public function menu_microsite(){
		$data = array(
			'usuario'=>$_SESSION['usuario'],
			'microsite'=>$this->em->getRepository('Microsite')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser()))
			);
		$this->load->view('index3',$data);
	}
	public function micro_perfil($iduser){
		if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
			if( $this->register->save($this->input->post(),0)){
				$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin/micro_perfil/'.$iduser);
			}else{
				$res = array('code'=>500,'msg'=>print_r($errors,true));	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			// $h = array(-1=>'',0=>,1=>)
			$data = array('post'=>base_url().'admin/micro_perfil/'.$iduser,
				'user'=>$this->em->getRepository('User')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser())));
			$this->load->view('editUser',$data);
		}
	}
	public function microsite_micro(){
		$data = array(
			'usuario'=>$_SESSION['usuario'],
			'microsite'=>$this->em->getRepository('Microsite')->findOneBy(array('iduser'=>$_SESSION['usuario']->getIduser())),
			'padres'=>$this->Modelcategoria->getPadres(),
			'hijos'=>$this->Modelcategoria->getPadresHijos(),
			'hijo1'=>$this->Modelcategoria->getHijos(1),
			'hijo2'=>$this->Modelcategoria->getHijos(2),
			'hijo3'=>$this->Modelcategoria->getHijos(3),
			'hijo4'=>$this->Modelcategoria->getHijos(4),
			'hijo5'=>$this->Modelcategoria->getHijos(5),
			'origen'=>1,
			'marcas'=>$this->ModelMarca->getAll(),
			'config'=>json_decode( file_get_contents(base_url().'public/js/site.config.json') ) 
		);
		$this->load->view('editMicrosite',$data);
	}
	public function categorias(){
		$data = array(
			'categorias'=>$this->Modelcategoria->getAll(),
			'padres'=>$this->Modelcategoria->getPadres()
			);
		$this->load->view('allCategorias',$data);
	}
	public function test2(){
		echo 'Rata' ;
	}
	public function dashboard(){
		$this->load->view('dashboard');
	}
	public function login(){
		if ($this->input->is_ajax_request()) {
			if($datos = $this->register->checkLogin($this->input->post())){
/*				if($datos->getEstatus() == 0){
					$res = array('code'=>500,'msg'=>'Su cuenta no esta activada.');
					$this->output->set_content_type('application/json')->set_output(json_encode($res));
				}elseif ($datos->getEstatus() == 1) {*/
					$_SESSION = array('usuario'=>$datos);
					if($datos->getNivelusuario() == 1)
						$res = array('code'=>200,'msg'=>'Login Exitoso entrando...','url'=>base_url().'admin');
					elseif($datos->getNivelusuario() == 0){
						$res = array('code'=>200,'msg'=>'Login Exitoso entrando...','url'=>base_url().'admin/menu_microsite');
					}elseif($datos->getNivelusuario() == -1){
						$res = array('code'=>200,'msg'=>'Login Exitoso entrando...','url'=>base_url().'admin/logout');
					}
				// }
			}else{
				$res = array('code'=>500,'msg'=>'Error de usario y/o Contraseña');
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}else{
			$this->load->view('login');
		}
	}
	public function logout(){
		unset($_SESSION['usuario']);
		$this->session->sess_destroy();
		redirect('/admin/login');
	}
	public function getUserByEmail(){
		$this->output->set_content_type('application/json')
		->set_output(json_encode($this->register->getUserByEmail($this->input->post('email'))));
	}
	public function activarCuenta($email,$key){
		// echo '<pre>';
		// echo urldecode($email);
		// echo '</pre>';
		if($key == md5(sha1(urldecode($email)))){
			$user = $this->em->getRepository("User")->findBy(array("email" => urldecode($email)));
		}else{
			echo 'Código Invalido';
		}
		print_r($user);
		// if($)
	}
	public function sendEmail(){
		// phpinfo();


		$this->phpmailerlib->enviarMail(
			array(
				'mensaje'=>'Texto',
				'asunto'=>'Activar cuenta TravelTale',
				'de'=>array(
					'TravelTale',
					'no-reply@traveltale.com'
					),
				'para'=>'facp0@hotmail.com'
				)
			);
		// $this->email->from('no-reply@traveltale.com', 'TravelTale');
		// $this->email->to('facp0@hotmail.com');
		// $this->email->subject('Activar cuenta TravelTale');
		// $this->email->message('Text');
		// $this->email->send();
	}
	public function register(){

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
					if( $this->register->save($this->input->post(),1)){
						$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin');
					}else{
						$res = array('code'=>500,'msg'=>print_r($errors,true));	
					}
				}else{
					$res = array('code'=>500,'msg'=>print_r($errors,true));
				}
				$this->output->set_content_type('application/json')->set_output(json_encode($res));
			}
		}else{
			$this->load->view('register');
		}
		
		// if ($this->input->is_ajax_request()  && $this->input->post('registro') == '1') {
		// 	if( $this->register->save($this->input->post(),1)){
		// 		$res = array('code'=>200,'msg'=>'Registro Exitoso','url'=>base_url().'admin');
		// 	}else{
		// 		$res = array('code'=>500,'msg'=>print_r($errors,true));	
		// 	}
		// 	$this->output->set_content_type('application/json')->set_output(json_encode($res));
		// }else{
		// 	$this->load->view('register');
		// }
	}

	public function getNacionalidades(){
		$this->output->set_content_type('application/json')
		->set_output(json_encode(array(
			'Afgano',
			'Alemán',
			'Árabe',
			'Argentino',
			'Australiano',
			'Inglés',
			'Belga',
			'Boliviano',
			'Brasilero',
			'Portugués',
			'Camboyano',
			'Canadiense',
			'Inglés',
			'Chileno',
			'Chino',
			'Chino',
			'Colombiano',
			'Español',
			'Coreano',
			'Costarricense',
			'Cubano',
			'Danés',
			'Ecuatoriano',
			'Egipcio',
			'Salvadoreño',
			'Estadounidense',
			'Estonio',
			'Etiope',
			'Amárico',
			'Filipino',
			'Tagalo',
			'Finlandés',
			'Francés',
			'Galés',
			'Griego',
			'Guatemalteco',
			'Haitiano',
			'Holandés',
			'Hondureño',
			'Indonesio',
			'Iraquí',
			'Iraní',
			'Persa',
			'Irlandés',
			'Israelí',
			'Italiano',
			'Japonés',
			'Jordano',
			'Laosiano',
			'Letón',
			'Lituano',
			'Malayo',
			'Marroquí',
			'Mexicano',
			'Nicaragüense',
			'Noruego',
			'Neozelandés',
			'Panameño',
			'Paraguayo',
			'Peruano',
			'Polaco',
			'Portugués',
			'Puertorriqueño',
			'Dominicano',
			'Rumano',
			'Ruso',
			'Sueco',
			'Suizo',
			'Tailandés',
			'Taiwanes',
			'Chino',
			'Turco',
			'Ucraniano',
			'Uruguayo',
			'Venezolano',
			'Vietnamita'
			)));
}
}
