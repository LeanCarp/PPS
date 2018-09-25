<?php

class Actividad extends OWN_Controller{	

	public function __construct() {
        parent::__construct();

        $this->load->logic('Extras');
    }

    public function AgregarActividad()
    {
        $descripcion = $this->rest->post('descripcion');
        $fechaInicio = $this->rest->post('fechaInicio');
        $fechaFin = $this->rest->post('fechaFin');
        if (!is_null($fechaInicio))
        $fechaInicio = date('Y-m-d',strtotime($fechaInicio));
        if (!is_null($fechaFin))
        $fechaFin = date('Y-m-d',strtotime($fechaFin));
        $horarios = $this->rest->post('horarios');
        $idAlumno = $this->rest->post('idAlumno');

        $insert_data = [
            'actividad'=> [
                'descripcion'=>$descripcion,
                'fechaInicio'=>$fechaInicio,
                'fechaFin'=>$fechaFin,
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

    public function Eliminar()
    {
        $id = $this->rest->post('idActividad');
        $data = $this->extras->EliminarActividad($id);
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
        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
        $data['fechaInicio']=  strftime('%x', strtotime($data['fechaInicio']));
         $data['fechaFin']=  strftime('%x', strtotime($data['fechaFin']));
        return $this->responseJson(['datos'=>$data]);
    }
}