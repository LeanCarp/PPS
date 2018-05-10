<?php

class Pais  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Extras');
	}

    public function Agregar()
    {
        $nombre = $this->rest->post('nombre');
        $data = array('nombre'=>$nombre);
        return $this->responseJson(['exito'=>$this->extras->AgregarPais($data)]);
    }

    public function Leer()
    {
        $id = $this->rest->post('id');
        $data = $this->extras->ObtenerPais($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ActualizarPais()
    {
        $id = $this->rest->post('id');
        $nombre = $this->rest->post('nombre');
        $data = array('nombre'=> $nombre);
        
        return $this->responseJson(['exito'=>$this->extras->ActualizarPais($data,$id)]);  
    }

}
?>