<?php

class Alumno extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/Extras');
         $this->load->library('CapaDeNegocio/Usuario');

    }

    public function Leer()
    {
        $this->load->model('User_model');

        $id = $this->rest->post('idAlumno');
                //Si se pasó un id se busca la comision correspondiente.
                if(is_null($id))
                    $data = $this->User_model->get_all();
                //Si no se pasó nada, se buscan todas.
                $data = $this->User_model->with_escuela()->get($id);

        return $this->responseJson(['datos'=>$data]);
    }

    public function ObtenerAlumnos()
    {
        $group = array('2');
        return $this->responseJson(['datos'=>$this->usuario->users($group)->result()]);   
    }
}