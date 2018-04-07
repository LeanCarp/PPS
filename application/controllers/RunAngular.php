<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RunAngular extends OWN_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$userLoggedIn = $this->ion_auth->user()->row();
		$this->load->view('index.php', ['casadecomidaID' => $userLoggedIn->casadecomidaID]);
	}
}
?>