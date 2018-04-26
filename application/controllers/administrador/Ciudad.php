<?php

class Ciudad  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->model('Ciudad_model');
	}

    public function Agregar()
    {
      /*  $nombre = $this->rest->post('nombre');
        $idPais = $this->rest->post('idPais');
        $insert_data = array('nombre'=>$nombre,'idPais'=>$idPais);*/

        $insert_data = array('nombre'=>'Cuba','idPais'=>'1');
        $this->Ciudad_model->insert($insert_data);
    }

    public function Leer()
    {
        //$id = $this->rest->post('id');
        $id=6;
        $data = $this->Ciudad_model->with_pais('fields:nombre')->get($id);
        var_dump($data);
        
    }

}
?>