<?php

class Cursada  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function AgregarCursada()
    {
        $estado = $this->rest->post('estado');
        $idAlumno = $this->rest->post('idAlumno');
        $idComision = $this->rest->post('comision'); 
        $insert_data = array('estado'=>$estado ,'idUsuario'=> $idAlumno,'idComision'=> $idComision);
        
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


       public function ObtenerCursadasUsuario()
    {
        $id = $this->rest->post('idUsuario');
        $data = $this->bedelia->ObtenerCursadasUsuario($id);
        return $this->responseJson(['datos'=>$data]);

    }

        



}
?>