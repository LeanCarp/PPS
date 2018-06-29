<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OWN_Loader extends CI_Loader {

	// Relative from the Library Folder
	private $logic_folder_path = "../logic/";

	public function __construct()
	{
		parent::__construct();
	}

	public function logic( $logic_file, $params = NULL, $object_name = NULL)
	{
		$this->library( $this->logic_folder_path.$logic_file, $params, $object_name);
	}

}