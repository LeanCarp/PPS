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
            $this->User_model->with_escuela()->get($id)
        );

        return $this->responseJson(['datos'=>$data]);
    }

    public function Actualizar(){
        
        $this->load->model('User_model');
        $id = $this->rest->post('id');
		$data = [
            'email' => $this->rest->post('email'),
            'phone'=> $this->rest->post('phone'),
        ];

        return $this->responseJson(['exito'=>$this->usuario->update($id, $data)]);
    }


}