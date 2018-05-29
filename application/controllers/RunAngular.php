<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RunAngular extends OWN_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$userLoggedIn = $this->ion_auth->user()->row();
		$data['idUsuario'] = $userLoggedIn->id;
		$userGroup = $this->ion_auth->get_users_groups($userLoggedIn->id)->result();
		$data['idGrupo'] = $userGroup;
		
		$this->load->view('index.php', $data);
	}
}
?>