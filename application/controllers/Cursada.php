<?php

class Cursada  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function Agregar()
    {
        $insert_data = array('estado'=>'Cursando','idUsuario'=>'1','idComision'=>'2');
        $this->bedelia->AgregarCursada($insert_data);
    }

    public function Leer($id=NULL)
    {
         $data = $this->bedelia->ObtenerCursada(1);
         var_dump($data);
        
    }

}
?>