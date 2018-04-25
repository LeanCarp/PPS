<?php

class Materia  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function AgregarMateria()
    {
        /*$nombre = $this->rest->post('nombre');
        $data = array('nombre'=> $nombre); */

        $data = array('nombre'=>'probando');
        
        return $this->responseJson(['exito'=>$this->bedelia->AgregarMateria($insert_data)]);
    }

    public function Leer()
    {
         $data = $this->Materia_model->with_dicta('fields:nombre')->get();
        return $this->responseJson(['comisiones'=>$data]);
        
    }

}
?>