<?php

class Comision  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->model('Comision_model');
	}

    public function Agregar()
    {
         $insert_data = array('cuatrimestre'=>'1ro','anio'=>'2018','idMateria'=>'1','nombreMateria'=>'Analisis 2');
        $this->Comision_model->insert($insert_data);
    }

    public function Leer()
    {
         $data = $this->Comision_model->with_materia('fields:nombre')->get(1);
         var_dump($data);
        
    }

}
?>