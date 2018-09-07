<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OWN_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->tienePermisos();
		$this->angularPath = "../../app/";
		$this->angularViews = "views/";
		$this->angularControllers = "controllers/";
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
	}

	protected function loadAngularView($viewName, $viewData = [], $viewSubFolders = "")
	{
		//Si no es vcio, hay que adicionar la barra divisoria carpeta/file
		if($viewSubFolders != "")
			$viewSubFolders = $viewSubFolders.DIRECTORY_SEPARATOR;//'/';

		$pathToView = $this->angularPath.$this->angularViews.$viewSubFolders.$viewName;
		$this->load->view($pathToView, $viewData);
	}

	protected function responseJavascript( $arrayOfPathToFiles, $isFilePath = true)
	{
		header('Content-Type: application/javascript');

		$javascriptBuffer = "";

		if($isFilePath) //Es una ruta o un array de rutas a archivos
		{
			if( ! is_array($arrayOfPathToFiles) && is_string($arrayOfPathToFiles) )
				$arrayOfPathToFiles = [$arrayOfPathToFiles];
			
			foreach ($arrayOfPathToFiles as $filePath)
			{
				$filePathJS = APPPATH."..".DIRECTORY_SEPARATOR.".".$filePath;
				$javascriptBuffer .= (" ".file_get_contents($filePathJS));
			}
		}
		else //Es un string que representa el contenido de un archivo js
			$javascriptBuffer = $arrayOfPathToFiles;
					
		echo $javascriptBuffer;
	}

}