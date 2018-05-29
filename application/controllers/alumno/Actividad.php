<?php

class Actividad extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/Extras');
    }

    public function Leer()
    {
        $id = $this->rest->post('id');
        $data = $this->extras->ObtenerActividad($id);
        return $this->responseJson(['datos'=>$data]);
        
    }

      public function ObtenerActividadesUsuario()
    {
        $id = $this->rest->post('idUsuario');
        $data = $this->extras->ObtenerActividadesUsuario($id);
        return $this->responseJson(['datos'=>$data]);
    }

}