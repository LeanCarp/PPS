<?php

class Materia  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function Agregar()
    {
         $data = array('nombre'=>'probando');
        $this->bedelia->AgregarMateria($data);
    }

   /* public function Leer()
    {
         $data = $this->Materia_model->with_dicta('fields:nombre')->get();
         var_dump($data);
        
    }*/

}
?>