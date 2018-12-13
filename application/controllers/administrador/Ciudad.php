<?php

class Ciudad  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();

		$this->load->logic('Extras');
	}

    public function Agregar()
    {
        $nombre = $this->rest->post('nombre');
        $idPais = $this->rest->post('idPais');
        $data = ['nombre'=>$nombre, 'idPais'=>$idPais];
        return $this->responseJson(['exito'=>$this->extras->AgregarCiudad($data)]);
    }

    public function Leer()
    {
        $id = $this->rest->post('id');
        $data = $this->extras->ObtenerCiudad($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ActualizarCiudad()
    {
        $id = $this->rest->post('id');
        $nombre = $this->rest->post('nombre');
        var_dump($id);
        echo("asd");
        var_dump($nombre);
        $data = ['nombre'=> $nombre];
        return $this->responseJson(['exito'=>$this->extras->ActualizarCiudad($data,$id)]);  
    }

}
?>