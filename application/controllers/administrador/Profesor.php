<?php
class Profesor  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();

		$this->load->logic('Bedelia');
	}

    public function AgregarProfesor()
    {
        $nombre = $this->rest->post('nombre');
        $apellido = $this->rest->post('apellido');
        $insert_data = ['nombre'=>$nombre ,'apellido'=>$apellido];
         return $this->responseJson(['exito'=>$this->bedelia->AgregarProfesor($insert_data)]);
    }

   public function Leer()
    {
        $id = $this->rest->post('id');
        $data = $this->bedelia->ObtenerProfesor($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ActualizarProfesor()
    {
        $id = $this->rest->post('id');
        $nombre = $this->rest->post('nombre');
        $apellido = $this->rest->post('apellido');
        $data = ['nombre'=> $nombre, 'apellido' => $apellido];
        
        return $this->responseJson(['exito'=>$this->bedelia->ActualizarProfesor($data, $id)]); 
    }

}
?>