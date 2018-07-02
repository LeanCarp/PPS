<?php

class Actividad extends OWN_Controller{	

	public function __construct() {
        parent::__construct();

        $this->load->logic('Extras');
    }

    public function AgregarActividad()
    {
        $descripcion = $this->rest->post('descripcion');;
        $horarios = $this->rest->post('horarios');
        $idAlumno = $this->rest->post('idAlumno');

        $insert_data = [
            'actividad'=> [
                'descripcion'=>$descripcion,
                'idUsuario'=>$idAlumno
            ],
            'horarios'=>$horarios,
        ];
        return $this->responseJson(['exito'=>$this->extras->AgregarActividad($insert_data)]);
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
    
    
       public function ObtenerActividad()
    {
        $id = $this->rest->post('idActividad');
        $data = $this->extras->ObtenerActividad($id);
        return $this->responseJson(['datos'=>$data]);
    }
}