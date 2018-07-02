<?php

class Alumno extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        
        $this->load->logic('Bedelia');
        $this->load->logic('Extras');
        $this->load->logic('Usuario');

    }

    public function Leer()
    {
        $this->load->model('User_model');

        $id = $this->rest->post('idAlumno');

        $data = (
            is_null($id) ?
            //Si no se paso id se buscan todas
            $this->User_model->get_all():
            //Si se paso id se devuelve ese
            $this->User_model->with_escuela()->get($id);
        );

        return $this->responseJson(['datos'=>$data]);
    }

    public function ObtenerAlumnos()
    {
        $group = array('2');
        return $this->responseJson(['datos'=>$this->usuario->users($group)->result()]);   
    }
}