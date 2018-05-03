<?php

class Cursada  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function AgregarCursada()
    {
       /* $estado = $this->rest->post('estado');
        $idAlumno = $this->rest->post('idAlumno');
        $idComision = $this->rest->post('idComision'); 
        $insert_data = array('estado'=>$estado ,'idUsuario'=> $idAlumno,'idComision'=> $idComision);*/
        
        $insert_data = array('estado'=>'Cursando','idUsuario'=>'1','idComision'=>'2');
        return $this->responseJson(['exito'=>$this->bedelia->AgregarCursada($insert_data)]);
    }

    public function ObtenerCursada($id=NULL)
    {
        $data = $this->bedelia->ObtenerCursada($id);
        return $this->responseJson(['datos'=>$data]);
        
    }

    public function ActualizarCursada()
    {
       $estado = $this->rest->post('estado');
        $idAlumno = $this->rest->post('idAlumno');
        $idComision = $this->rest->post('idComision'); 

        $insert_data = array('estado'=>$estado ,'idUsuario'=> $idAlumno,'idComision'=> $idComision);
        
        return $this->responseJson(['exito'=>$this->bedelia->ActualizarCursada($insert_data)]);
    }


    public function AgregarExamen()
    {
        $nota = $this->rest->post('nota');
        $descripcion = $this->rest->post('descripcion');
        $tipo = $this->rest->post('tipo');
        $fecha = $this->rest->post('fecha');
        $idCursada = $this->rest->post('idCursada');
        $comentario = $this->rest->post('comentario'); 

        $insert_data = array('nota'=>$nota,'descripcion'=>$descripcion,'tipo'=>$tipo,'fecha'=>$fecha,'idCursada'=>$idCursada,'comentario'=>$comentario);
       
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

        $update_data = array('nota'=>$nota,'descripcion'=>$descripcion,'tipo'=>$tipo,'fecha'=>$fecha,'idCursada'=>$idCursada,'comentario'=>$comentario);
       
        return $this->responseJson(['exito'=>$this->bedelia->ActualizarExamen($update_data)]);
    }

        



}
?>