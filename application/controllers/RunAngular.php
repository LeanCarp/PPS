<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RunAngular extends OWN_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->userLoggedIn = $this->ion_auth->user()->row();
		$this->data['idUsuario'] = $this->userLoggedIn->id;
		$userGroup = $this->ion_auth->get_users_groups( $this->userLoggedIn->id )->result();
		$this->data['idGrupo'] = $userGroup;
	}
	
	public function index()
	{	
		$this->load->view('index.php', $this->data);
	}

	public function view($folder, $name = "")
	{
		//Si el name es vacio, quiere decir que en realidad la folder es el name
		if($name=="")
		{
			$name = $folder;
			$folder = "";
		}
		$this->loadAngularView( $name, [], $folder);	
	}

}
?>