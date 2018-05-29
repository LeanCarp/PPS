<?php

class Cursada  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
    }
    
    public function ObtenerCursadasUsuario()
    {
        $id = $this->rest->post('idUsuario');
        $data = $this->bedelia->ObtenerCursadasUsuario($id);
        return $this->responseJson(['datos'=>$data]);
    }
}
?>