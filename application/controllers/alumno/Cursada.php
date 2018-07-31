<?php

class Cursada  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();

		$this->load->logic('Bedelia');
    }
    
    public function ObtenerCursadasUsuario()
    {
        $id = $this->rest->post('idUsuario');
        $data = $this->bedelia->ObtenerCursadasUsuario($id);
        return $this->responseJson(['datos'=>$data]);
    }


        public function ObtenerArchivosMateria()
    {
        
        $id = $this->rest->post('id');
        $data = $this->bedelia->ObtenerMateria($id);
        return $this->responseJson(['datos'=>$data]);
    }
}
?>