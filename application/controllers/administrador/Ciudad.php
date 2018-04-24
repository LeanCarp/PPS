<?php

class Ciudad  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->model('Ciudad_model');
	}

    public function Agregar()
    {
         $insert_data = array('nombre'=>'Cuba','idPais'=>'1');
        $this->Ciudad_model->insert($insert_data);
    }

    public function Leer()
    {
         $data = $this->Ciudad_model->with_pais('fields:nombre')->get(6);
         var_dump($data);
        
    }

}
?>