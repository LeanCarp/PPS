<?php

class Pais  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();

		$this->load->logic('Extras');
	}

    public function Agregar()
    {
        $nombre = $this->rest->post('nombre');
        $data = ['nombre'=>$nombre];
        return $this->responseJson(['exito'=>$this->extras->AgregarPais($data)]);
    }

    public function Leer()
    {
        $id = $this->rest->post('id');
        $data = $this->extras->ObtenerPais($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ActualizarPais()
    {
        $id = $this->rest->post('id');
        $nombre = $this->rest->post('nombre');
        $data = ['nombre'=>$nombre];        
        return $this->responseJson(['exito'=>$this->extras->ActualizarPais($data,$id)]);  
    }

     public function Validar()
    {
        $valido=true;
        $nombrePais = $this->rest->post('nombre');
        $paises = $this->extras->ObtenerPais();
        foreach ($paises as $pais){
            if (strtoupper($pais['nombre'])==strtoupper($nombrePais))
            $valido=false;
        }
        return $this->responseJson(['exito'=>$valido]);
    }

      public function Eliminar()
    {
        $id = $this->rest->post('idPais');
        $data = $this->extras->EliminarPais($id);
        return $this->responseJson(['datos'=>$data]);
    }

}
?>