<?php

class Tutores extends OWN_Controller{	

	public function __construct() {
        parent::__construct();

        $this->load->logic('Extras');
        $this->load->logic('Usuario');
    }

    public function AgregarTutor()
    {
        $username = $this->rest->post('dni');
		$password = $this->rest->post('dni');
		$email = $this->rest->post('email');
		$additional_data = [
    		'first_name' => $this->rest->post('first_name'),
    		'last_name' => $this->rest->post('last_name'),
            'phone'=> $this->rest->post('phone'),
		];
		$group = ['3']; // Sets user to alumno.

        return $this->responseJson(['exito'=>$this->usuario->register($username, $password, $email, $additional_data, $group)]); 
    }

    public function Leer()
    {
        $this->load->model('User_model');

        $id = $this->rest->post('idTutor');
        $data = (
            is_null($id) ?
            //Si no se pasó nada, se buscan todas.
            $this->User_model->get_all():
            //Si se pasó un id se busca la comision correspondiente.
            $this->User_model->with_informe()->get($id)
        );

        return $this->responseJson(['datos'=>$data]);
    }

    public function ObtenerTutores(){
        $group = ['3'];
        return $this->responseJson(['datos'=>$this->usuario->users($group)->result()]);
    }

    public function ActualizarTutor(){

        $id = $this->rest->post('id');
		$data = [
            'first_name' => $this->rest->post('first_name'),
            'last_name' => $this->rest->post('last_name'),
            'email' => $this->rest->post('email'),
            'phone'=> $this->rest->post('phone'),
        ];

        return $this->responseJson(['exito'=>$this->usuario->update($id, $data)]);
    }

    public function ObtenerInformes()
    {
        $id = $this->rest->post('idUsuario');      
        return $this->responseJson(['datos'=>$this->extras->ObtenerInformesTutor($id)]);
    }
}