<?php

class Informe extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/Extras');
        $this->load->library('CapaDeNegocio/Usuario');
    }

    public function Leer()
    {
        $id = $this->rest->post('idInforme');
        $data = $this->extras->ObtenerInforme($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ObtenerInformesUsuario()
    {
        $id = $this->rest->post('idUsuario');
        $data = $this->extras->ObtenerInformesUsuario($id);
        return $this->responseJson(['datos'=>$data]);
    }

}