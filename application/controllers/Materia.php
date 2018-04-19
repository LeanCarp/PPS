<?php

class Materia  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->model('Materia_model');
	}

    public function Agregar()
    {
         $insert_data = array('nombre'=>'Analisis 2');
        $this->Materia_model->insert($insert_data);
    }

   /* public function Leer()
    {
         $data = $this->Materia_model->with_dicta('fields:nombre')->get();
         var_dump($data);
        
    }*/

}
?>