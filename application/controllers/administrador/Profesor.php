<?php

class Profesor  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function AgregarProfesor()
    {
        $nombre = $this->rest->post('nombre');
        $apellido = $this->rest->post('apellido');
        $insert_data = array('nombre'=>$nombre ,'apellido'=>$apellido);
         return $this->responseJson(['exito'=>$this->bedelia->AgregarProfesor($insert_data)]);
    }

   public function Leer()
    {
<<<<<<< HEAD
        $data = $this->bedelia->ObtenerProfesor();        
        return ($this->responseJson(['datos'=>$data]));
=======

         $id = $this->rest->post('id');
        $data = $this->bedelia->ObtenerProfesor($id);
        return $this->responseJson(['datos'=>$data]);
>>>>>>> 901d052b5a1f118c715ae7d3ee7263cf6aedb980
        
    }

}
?>