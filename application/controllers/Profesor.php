<?php

class Profesor  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->model('Profesor_model');
	}

    public function Agregar()
    {
         $insert_data = array('nombre'=>'Mario','apellido'=>'Escalante');
        $this->Profesor_model->insert($insert_data);
    }

   /* public function Leer()
    {
         $data = $this->Profesor_model->with_dicta('fields:nombre')->get();
         var_dump($data);
        
    }*/

}
?>