<?php

class Actividad extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/Extras');
    }

    public function AgregarActividad()
    {
        $descripcion = $this->rest->post('descripcion');;
        $horarios = $this->rest->post('horarios');
        $idAlumno = $this->rest->post('idAlumno');

        $insert_data = [
                            'descripcion'=>$descripcion,
                            'horario'=>$horarios,
                            'idUsuario'$idAlumno,
                ];
        return $this->responseJson(['exito'=>$this->extras->AgregarActividad($insert_data)]);
    }

    public function Leer()
    {
        $id = $this->rest->post('id');
        $data = $this->extras->ObtenerActividad($id);
        return $this->responseJson(['datos'=>$data]);
        
    }

}