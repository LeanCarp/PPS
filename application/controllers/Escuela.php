<?php

class Escuela  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->model('Escuela_model');
	}

    public function Agregar()
    {
         $insert_data = array('nombre'=>'Pio 12','orientacion'=>'humanidades','idCiudad'=>'6');
        $this->Escuela_model->insert($insert_data);
    }

    public function Leer()
    {
         $data = $this->Escuela_model->with_ciudad('fields:nombre')->get();
         var_dump($data);
        
    }

}
?>