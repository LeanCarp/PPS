<?php

class Profesor  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function Agregar()
    {
         $insert_data = array('nombre'=>'Enrique','apellido'=>'Proyecto');
        $this->bedelia->AgregarProfesor($insert_data);
    }

   public function Leer()
    {
         $data = $this->bedelia->ObtenerProfesor();
         var_dump($data);
        
    }

}
?>