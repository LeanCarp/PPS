<?php

class Archivo extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/Extras');
    }

    public function AgregarArchivo()
    {
        /*$descripcion = $this->rest->post('descripcion');;


        $insert_data = [
                            'archivo'=>array('descripcion'=>$descripcion,'idUsuario'=>$idAlumno),

                        ];
        return $this->responseJson(['exito'=>$this->extras->AgregarArchivo($insert_data)]);*/
    }

    public function Leer()
    {/*
        $id = $this->rest->post('id');
        $data = $this->extras->ObtenerArchivo($id);
        return $this->responseJson(['datos'=>$data]);*/
        
    }

      public function ObtenerArchivosMateria()
    {
        /*
        $id = $this->rest->post('idUsuario');
        $data = $this->extras->ObtenerArchivoUsuario($id);
        return $this->responseJson(['datos'=>$data]);*/
    }

}