<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->em = $this->doctrine->em;
	}
	public function index()
	{
		// $this->load->view('index');
		echo 'test';
	}
	public function restaurar(){
		$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($this->em);
		$classes = $this->em->getMetadataFactory()->getAllMetadata();
		$schemaTool->createSchema($classes);
	}
	public function generarEntidadesDoctrine(){
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
}
