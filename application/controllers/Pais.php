<?php

class Pais  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->model('Pais_model');
	}

    public function Agregar()
    {
         $insert_data = array('nombre'=>'Cuba');
        $this->Pais_model->insert($insert_data);
    }

}
?>