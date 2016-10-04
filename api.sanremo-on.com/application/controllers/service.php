<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
session_start();
class Service extends REST_Controller{
	// MICROSITE
	public function __construct(){
	    header('Access-Control-Allow-Origin: *');
    	header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    	$method = $_SERVER['REQUEST_METHOD'];
    	if($method == "OPTIONS") {
        	die();
    	}
    	parent::__construct();


	}
	function microsite_get(){
		if(!$this->get('id') && !$this->get('url') && !$this->get('news')){
			$this->response(NULL, 400);
		}
		$this->load->model('ModelMicrosite');
		if($this->get('id')){
			$microsite = $this->ModelMicrosite->get($this->get('id'));
		}elseif($this->get('url')){
			$microsite = $this->ModelMicrosite->getByUrl($this->get('url'));
		} elseif($this->get('news')){
			$microsite = $this->ModelMicrosite->getNews($this->get('news'));
		}
		// print_r($microsite);
		if($microsite)
			$this->response(json_decode(json_encode($microsite)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function microsites_get(){
		$this->load->model('ModelMicrosite');
		$microsites = $this->ModelMicrosite->getAll();
		if($microsites)
			$this->response(json_decode(json_encode($microsites)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function microsite_post(){
		$this->load->model('ModelMicrosite');
		if($this->ModelMicrosite->save($this->post()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);

	}
	function microsite_put(){
		$this->load->model('ModelMicrosite');
		if($this->ModelMicrosite->save($this->put()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}
	function microsite_delete(){
		$this->load->model('ModelMicrosite');
		if($this->ModelMicrosite->delete($this->get('id')))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}

	// Noticias
	function noticia_get(){
		if(!$this->get('id') && !$this->get('url')){
			$this->response(NULL, 400);
		}
		$this->load->model('ModelNoticias');
		if($this->get('id')){
			$noticia = $this->ModelNoticias->get($this->get('id'));
		}elseif($this->get('url')){
			$noticia = $this->ModelNoticias->getByUrl($this->get('url'));
		}
		// print_r($noticia);
		if($noticia)
			$this->response(json_decode(json_encode($noticia)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function noticias_get(){
		$this->load->model('ModelNoticias');
		$noticias = $this->ModelNoticias->getAll();
		if($noticias)
			$this->response(json_decode(json_encode($noticias)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function noticia_post(){
		$this->load->model('ModelNoticias');
		if($this->ModelNoticias->save($this->post()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);

	}
	function noticia_put(){
		$this->load->model('ModelNoticias');
		if($this->ModelNoticias->save($this->put()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}
	function noticia_delete(){
		$this->load->model('ModelNoticias');
		if($this->ModelMicrosite->delete($this->get('id')))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}	

	// Eventos

	function evento_get(){
		if(!$this->get('id') && !$this->get('url')){
			$this->response(NULL, 400);
		}
		$this->load->model('ModelEvento');
		if($this->get('id')){
			$evento = $this->ModelEvento->get($this->get('id'));
		}elseif($this->get('url')){
			$evento = $this->ModelEvento->getByUrl($this->get('url'));
		}
		// print_r($evento);
		if($evento)
			$this->response(json_decode(json_encode($evento)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function eventos_get(){
		$this->load->model('ModelEvento');
		$eventos = $this->ModelEvento->getAll();
		if($eventos)
			$this->response(json_decode(json_encode($eventos)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function evento_post(){
		$this->load->model('ModelEvento');
		if($this->ModelEvento->save($this->post()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);

	}
	function evento_put(){
		$this->load->model('ModelEvento');
		if($this->ModelEvento->save($this->put()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}
	function evento_delete(){
		$this->load->model('ModelEvento');
		if($this->ModelEvento->delete($this->get('id')))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}	

	// // Ofertas

	function oferta_get(){
		if(!$this->get('id') && !$this->get('url')){
			$this->response(NULL, 400);
		}
		$this->load->model('ModelOfertas');
		if($this->get('id')){
			$oferta = $this->ModelOfertas->get($this->get('id'));
		}elseif($this->get('url')){
			$oferta = $this->ModelOfertas->getByUrl($this->get('url'));
		}
		// print_r($oferta);
		if($oferta)
			$this->response(json_decode(json_encode($oferta)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function ofertas_get(){
		$this->load->model('ModelOfertas');
		$ofertas = $this->ModelOfertas->getAll();
		if($ofertas)
			$this->response(json_decode(json_encode($ofertas)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function oferta_post(){
		$this->load->model('ModelOfertas');
		if($this->ModelOfertas->save($this->post()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);

	}
	function oferta_put(){
		$this->load->model('ModelOfertas');
		if($this->ModelOfertas->save($this->put()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}
	function oferta_delete(){
		$this->load->model('ModelOfertas');
		if($this->ModelOfertas->delete($this->get('id')))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}	


	function micrositeMarcaCategoria_get(){
		$this->load->model('ModelMicrosite');
		$categoria = $this->ModelMicrosite->getMarcaCategoria($this->get('marca'),$this->get('cat'));
		if($categoria)
			$this->response(json_decode(json_encode($categoria)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}

	function micrositeCategoria_get(){
		$this->load->model('ModelMicrosite');
		$categoria = $this->ModelMicrosite->getCat($this->get('cat'));
		if($categoria)
			$this->response(json_decode(json_encode($categoria)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}	

	function micrositeCategoriaSubcategoria_get(){
		$this->load->model('ModelMicrosite');
		$categoria = $this->ModelMicrosite->getCatSubcat($this->get('cat'),$this->get('subCat'));
		if($categoria)
			$this->response(json_decode(json_encode($categoria)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function isFavorito_get(){
		$this->load->model('ModelMicrosite');
		$res = $this->ModelMicrosite->isFavorito($this->get('user'),$this->get('micro'));
		$this->response(array('code'=>200,'res'=>$res));
	}
	function addFavorito_get(){
		$this->load->model('ModelMicrosite');
		$this->ModelMicrosite->addFavorito($this->get('user'),$this->get('micro'));
		$this->response(array('code'=>200));
	}
	function removeFavorito_get(){
		$this->load->model('ModelMicrosite');
		$this->ModelMicrosite->removeFavorito($this->get('user'),$this->get('micro'));
		$this->response(array('code'=>200));
	}
	function micrositefavoritos_get(){
		$this->load->model('ModelMicrosite');
		$categoria = $this->ModelMicrosite->getFavoritos($this->get('user'));
		if($categoria)
			$this->response(json_decode(json_encode($categoria)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}








	// Categorias
	function categoria_get(){
		if(!$this->get('id')){
			$this->response(NULL, 400);
		}
		$this->load->model('Modelcategoria');
		$categoria = $this->Modelcategoria->get($this->get('id'));
		if($categoria)
			$this->response(json_decode(json_encode($categoria)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function subcategorias_get(){
		if(!$this->get('id')){
			$this->response(NULL, 400);
		}
		$this->load->model('Modelcategoria');
		$categoria = $this->Modelcategoria->getHijos($this->get('id'));
		if($categoria)
			$this->response(json_decode(json_encode($categoria)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function categorias_get(){
		$this->load->model('Modelcategoria');
		$categorias = $this->Modelcategoria->getAll();
		if($categorias)
			$this->response(json_decode(json_encode($categorias)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function categoria_post(){
		$this->load->model('Modelcategoria');
		if($this->Modelcategoria->save($this->post()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);

	}
	function categoria_put(){
		$this->load->model('Modelcategoria');
		if($this->Modelcategoria->save($this->put()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}
	function categoria_delete(){
		$this->load->model('Modelcategoria');
		if($this->Modelcategoria->delete($this->get('id')))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}	

	// User
	function login_post(){
		$this->load->model('Register');
		if($datos = $this->Register->checkLogin($this->post())){
			$_SESSION = array('usuario'=>$datos);
			$res = array('code'=>200,'msg'=>'Login Exitoso','usuario'=>$datos);
		}else{
			$res = array('code'=>500,'msg'=>'Error de usario y/o Contraseña');
		}
		$this->response($res);
	}
	function login_get(){
		$this->load->model('Register');
		if($datos = $this->Register->checkLogin($this->get())){
			$_SESSION = array('usuario'=>$datos);
			$res = array('code'=>200,'msg'=>'Login Exitoso','usuario'=>$datos);
		}else{
			$res = array('code'=>500,'msg'=>'Error de usario y/o Contraseña');
		}
		$this->response($res);
	}
	function isLogged_get(){
		$this->load->model('Register');
		if(isset($_SESSION['usuario'])){
			$this->response($_SESSION['usuario']);
		}else{
			$this->response(array('msg'=>'No esta logueado','code'=>600));
		}
	}
	function logout_get(){
		unset($_SESSION['usuario']);
		$this->response(array('code'=>200,'msg'=>'logout Exitoso.'));
	}
	function user_get(){
		if(!$this->get('id')){
			$this->response(NULL, 400);
		}
		$this->load->model('Register');
		$user = $this->Register->get($this->get('id'));
		if($user)
			$this->response(json_decode(json_encode($user)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function users_get(){
		$this->load->model('Register');
		$users = $this->Register->getAll();
		if($users)
			$this->response(json_decode(json_encode($users)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function user_post(){
		$this->load->model('Register');
		if($this->Register->save($this->post()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);

	}
	function user_put(){
		$this->load->model('Register');
		if($this->Register->save($this->put()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}
	function user_delete(){
		$this->load->model('Register');
		if($this->Register->delete($this->get('id')))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}

	// Marca
	function marca_get(){
		if(!$this->get('id')){
			$this->response(NULL, 400);
		}
		$this->load->model('ModelMarca');
		$marca = $this->ModelMarca->get($this->get('id'));
		if($marca)
			$this->response(json_decode(json_encode($marca)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function marcas_get(){
		$this->load->model('ModelMarca');
		$marcas = $this->ModelMarca->getAll();
		if($marcas)
			$this->response(json_decode(json_encode($marcas)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function marca_post(){
		$this->load->model('ModelMarca');
		if($this->ModelMarca->save($this->post()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);

	}
	function marca_put(){
		$this->load->model('ModelMarca');
		if($this->ModelMarca->save($this->put()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}
	function marca_delete(){
		$this->load->model('ModelMarca');
		if($this->ModelMarca->delete($this->get('id')))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}



	// Servicios
	function servicio_get(){
		if(!$this->get('id')){
			$this->response(NULL, 400);
		}
		$this->load->model('ModelServicio');
		$servicio = $this->Modelservicio->get($this->get('id'));
		if($servicio)
			$this->response(json_decode(json_encode($servicio)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function servicios_get(){
		$this->load->model('ModelServicio');
		$servicios = $this->ModelServicio->getAll();
		if($servicios)
			$this->response(json_decode(json_encode($servicios)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function servicio_post(){
		$this->load->model('ModelServicio');
		if($this->ModelServicio->save($this->post()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);

	}
	function servicio_put(){
		$this->load->model('ModelServicio');
		if($this->ModelServicio->save($this->put()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}
	function servicio_delete(){
		$this->load->model('ModelServicio');
		if($this->ModelServicio->delete($this->get('id')))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}




	function banner_get(){
		if(!$this->get('id')){
			$this->response(NULL, 400);
		}
		$this->load->model('ModelBanner');
		$servicio = $this->ModelBanner->get($this->get('id'));
		if($servicio)
			$this->response(json_decode(json_encode($servicio)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function banners_get(){
		$this->load->model('ModelBanner');
		$servicios = $this->ModelBanner->getAll();
		if($servicios)
			$this->response(json_decode(json_encode($servicios)), 200);
		else
			$this->response(array('error' => 'No encontrado'), 404);
	}
	function banner_post(){
		$this->load->model('ModelBanner');
		if($this->ModelBanner->save($this->post()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);

	}
	function banner_put(){
		$this->load->model('ModelBanner');
		if($this->ModelBanner->save($this->put()))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}
	function banner_delete(){
		$this->load->model('ModelBanner');
		if($this->ModelBanner->delete($this->get('id')))
			$this->response(array('msg'=> 'Exito'),200);
		else
			$this->response(array('msg'=> 'Error'),200);  
	}	

}