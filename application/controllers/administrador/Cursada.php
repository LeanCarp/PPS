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
        $insert_data = [
            'estado'=>$estado,
            'idUsuario'=> $idAlumno,
            'idComision'=> $idComision,
        ];
        
        return $this->responseJson(['exito'=>$this->bedelia->AgregarCursada($insert_data)]);
    }

    public function ObtenerCursada()
    {
        $id = $this->rest->post('idCursada');
        $data = $this->bedelia->ObtenerCursada($id);
        return $this->responseJson(['datos'=>$data]);
        
    }

    public function ActualizarCursada()
    {
        $id = $this->rest->post('id');
        $estado = $this->rest->post('estado');
        //$idAlumno = $this->rest->post('idAlumno');
        $idComision = $this->rest->post('comision'); 
        $nota = $this->rest->post('nota'); 

        $data = [
            'estado'=>$estado,
            'idComision'=> $idComision,
            'nota' => $nota
        ];
        
        return $this->responseJson(['exito'=>$this->bedelia->ActualizarCursada($data, $id)]);
    }


       public function ObtenerCursadasUsuario()
    {
        $id = $this->rest->post('idUsuario');
        $data = $this->bedelia->ObtenerCursadasUsuario($id);
        return $this->responseJson(['datos'=>$data]);

    }    

}
?>