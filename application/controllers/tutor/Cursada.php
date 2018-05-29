<?php

class Cursada  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function ObtenerCursada()
    {
        $id = $this->rest->post('idCursada');
        $data = $this->bedelia->ObtenerCursada($id);
        return $this->responseJson(['datos'=>$data]);
        
    }

    public function ObtenerCursadasUsuario()
    {
        $id = $this->rest->post('idUsuario');
        $data = $this->bedelia->ObtenerCursadasUsuario($id);
        return $this->responseJson(['datos'=>$data]);
    }
}
?>