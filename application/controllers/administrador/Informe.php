<?php

class Informe extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/Extras');
        $this->load->library('CapaDeNegocio/Usuario');
    }

    public function AgregarInforme()
    {
        $descripcion = $this->rest->post('descripcion');
        $titulo = $this->rest->post('titulo');
        $fecha = $this->rest->post('fecha');
        $idAlumno = $this->rest->post('idAlumno');
        $idAutor= $this->usuario->user()->row()->id;

        $insert_data = [
                            'descripcion'=>$descripcion,
                            'titulo'=>$titulo,
                            'fecha'=>$fecha,
                            'idUsuario'=>$idAlumno,
                ];
        return $this->responseJson(['exito'=>$this->extras->AgregarInforme($insert_data)]);
    }

    public function Leer()
    {
        $id = $this->rest->post('idInforme');
        $data = $this->extras->ObtenerInforme($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ActualizarInforme()
    {
        $descripcion = $this->rest->post('descripcion');
        $titulo = $this->rest->post('titulo');
        $fecha = $this->rest->post('fecha');
        $idAlumno = $this->rest->post('idAlumno');
        $id = $this->rest->post('idInforme');

        $data = [
                    'descripcion'=>$descripcion,
                    'titulo'=>$titulo,
                    'fecha'=>$fecha,
                    'idUsuario'=>$idAlumno,
        ];
        
        return $this->responseJson(['exito'=>$this->extras->ActualizarInforme($data, $id)]); 
    }

    public function ObtenerInformesUsuario()
    {
        $id = $this->rest->post('idUsuario');
        $data = $this->extras->ObtenerInformesUsuario($id);
        return $this->responseJson(['datos'=>$data]);
    }

}