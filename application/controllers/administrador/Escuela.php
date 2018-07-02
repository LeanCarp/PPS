<?php

class Escuela  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();

		$this->load->logic('Extras');
	}

    public function Agregar()
    {
        $nombre = $this->rest->post('nombre');
        $orientacion = $this->rest->post('orientacion');
        $idCiudad = $this->rest->post('idCiudad');
        $data = [
            'nombre'=>$nombre,
            'orientacion'=>$orientacion,
            'idCiudad'=>$idCiudad
        ];

        return $this->responseJson(['exito'=>$this->extras->AgregarEscuela($data)]);
    }

    public function Leer()
    {
        $id = $this->rest->post('id');
        $data = $this->extras->ObtenerEscuela($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ActualizarEscuela()
    {
        $id = $this->rest->post('id');
        $nombre = $this->rest->post('nombre');
        $orientacion = $this->rest->post('orientacion');
        $idCiudad = $this->rest->post('idCiudad');
        $data = [
            'nombre'=>$nombre,
            'orientacion'=>$orientacion,
            'idCiudad'=>$idCiudad
        ];
        return $this->responseJson(['exito'=>$this->extras->ActualizarEscuela($data, $id)]);  
    }

}
?>