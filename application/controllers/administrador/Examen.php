<?php

class Examen  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();

		$this->load->logic('Bedelia');
	}

     public function AgregarExamen()
    {
        $nota = $this->rest->post('nota');
        $descripcion = $this->rest->post('descripcion');
        $tipo = $this->rest->post('tipo');
        $fecha = $this->rest->post('fecha');
        $idCursada = $this->rest->post('idCursada');
        $comentario = $this->rest->post('comentario'); 

        $insert_data = [
            'nota'=>$nota,
            'descripcion'=>$descripcion,
            'tipo'=>$tipo,
            'fecha'=>$fecha,
            'idCursada'=>$idCursada,
            'comentario'=>$comentario
        ];
       
        return $this->responseJson(['exito'=>$this->bedelia->AgregarExamen($insert_data)]);
    }

    public function ActualizarExamen()
    {
        $nota = $this->rest->post('nota');
        $descripcion = $this->rest->post('descripcion');
        $tipo = $this->rest->post('tipo');
        $fecha = $this->rest->post('fecha');
        $idCursada = $this->rest->post('idCursada');
        $comentario = $this->rest->post('comentario'); 

        $update_data = [
            'nota'=>$nota,
            'descripcion'=>$descripcion,
            'tipo'=>$tipo,
            'fecha'=>$fecha,
            'idCursada'=>$idCursada,
            'comentario'=>$comentario
        ];
       
        return $this->responseJson(['exito'=>$this->bedelia->ActualizarExamen($update_data)]);
    }

    public function ObtenerExamenesCursada()
    {
        $id= $this->rest->post('idCursada');
        $data = $this->bedelia->ObtenerCursada($id);
        return $this->responseJson(['datos'=>$data]);
        
    }

      public function ObtenerExamenes()
    {
        $id= $this->rest->post('idCursada');
        $data = $this->bedelia->ObtenerExamen($id);
        return $this->responseJson(['datos'=>$data]);
        
    }

        



}
?>