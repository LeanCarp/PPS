<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OWN_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->tienePermisos();
		$this->angularPath = "../../app/";
		$this->angularViews = "views/";
	}
	/*
	private function tienePermisos()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}
	*/
	protected function responseJson( $obj=[] )
	{
		header('Content-Type: application/json');
		echo json_encode( $obj );
		return true;
	}

	protected function loadAngularView($viewName, $viewData = [], $viewSubFolders = "")
	{
		$pathToView = $this->angularPath.$this->angularViews.$viewSubFolders.$viewName;
		$this->load->view($pathToView, $viewData);
	}

}