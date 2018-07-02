<?php

class Materia  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();

		$this->load->logic('Bedelia');
	}

    public function AgregarMateria()
    {
        $nombre = $this->rest->post('nombre');
        $data = ['nombre'=> $nombre];
 
        return $this->responseJson(['exito'=>$this->bedelia->AgregarMateria($data)]);
    }

    public function Leer()
    {
        $id = $this->rest->post('id');
        $data = $this->bedelia->obtenerMateria($id);
        return $this->responseJson(['datos'=>$data]);  
    }

    public function ActualizarMateria()
    {
        $id = $this->rest->post('id');
        $nombre = $this->rest->post('nombre');
        $data = ['nombre'=> $nombre];
        
        return $this->responseJson(['exito'=>$this->bedelia->ActualizarMateria($data,$id)]);  
    }

}
?>