<?php

class Archivo extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/ManejoArchivo');
    }

    public function AgregarArchivo()
    {
        $titulo = $this->rest->post('titulo');
        $descripcion = $this->rest->post('descripcion');
        $ruta = $this->rest->post('fuente');
        $idMateria = $this->rest->post('idMateria');
        $tipo=$this->rest->post('tipo');


        $insert_data = [
                            'titulo'=>$titulo,
                            'descripcion'=>$descripcion,
                            'idMateria'=>$idMateria,
                            'ruta'=>$ruta,
                            'idCategoriaArchivo'=> $tipo                        
                        ];
        return $this->responseJson(['exito'=>$this->manejoarchivo->AgregarArchivo($insert_data)]);
    }

    public function Leer()
    {/*
        $id = $this->rest->post('id');
        $data = $this->extras->ObtenerArchivo($id);
        return $this->responseJson(['datos'=>$data]);*/
        
    }

      public function ObtenerArchivosMateria()
    {
        
        $id = $this->rest->post('idUsuario');
        $data = $this->bedelia->ObtenerMateria($id);
        return $this->responseJson(['datos'=>$data]);
    }

}