<?php

class Alumnos extends OWN_Controller{	

	public function __construct() {
        parent::__construct();

        $this->load->logic('Bedelia');
        $this->load->logic('Extras');
        $this->load->logic('Usuario');
    }

    public function AgregarAlumno()
    {
        $username = $this->rest->post('dni');
		$password = $this->rest->post('dni');
		$email = $this->rest->post('email');
		$additional_data = [
			'first_name' => $this->rest->post('first_name'),
			'last_name' => $this->rest->post('last_name'),
            'phone'=> $this->rest->post('phone'),
            'anioIngreso'=>$this->rest->post('anioIngreso'),
            'carrera'=>$this->rest->post('carrera'),
            'idEscuela'=>$this->rest->post('escuela'),
		];
		$group = array('2'); // Sets user to alumno.

        return $this->responseJson(['exito'=>$this->usuario->register($username, $password, $email, $additional_data, $group)]); 
    }

    public function ObtenerAlumnos()
    {
        $group = ['2'];
        return $this->responseJson(['datos'=>$this->usuario->users($group)->result()]);   
    }

    public function Leer()
    {
        $this->load->model('User_model');

        $id = $this->rest->post('idAlumno');

        $data = (
            is_null($id) ?
            ///Si no se pasó un id se buscan todos.
            $this->User_model->get_all():
            //Si se pasó un id se busca el usuario correspondiente.
            $this->User_model->with_escuela()->get($id)
        );

        return $this->responseJson(['datos'=>$data]);
    }

    public function Actualizar(){

        $this->load->model('User_model');
        $id = $this->rest->post('id');
		$data = [
            'first_name' => $this->rest->post('first_name'),
            'last_name' => $this->rest->post('last_name'),
            'email' => $this->rest->post('email'),
            'phone'=> $this->rest->post('phone'),
            'anioIngreso'=>$this->rest->post('anioIngreso'),
            'carrera'=>$this->rest->post('carrera'),
            'idEscuela'=>$this->rest->post('escuela'),
        ];

        return $this->responseJson(['exito'=>$this->usuario->update($id, $data)]);
    }

    public function AgregarActividad()
    {
        $descripcion = $this->rest->post('descripcion');
        $idAlumno = $this->rest->post('idAlumno');
        $horarios = $this->rest->post('horarios');

        $insert_data = [
            'actividad'=>[
                'descripcion'=>$descripcion,
                'idUsuario'=>$idAlumno
            ],
            'horarios'=>$horarios,
            //'horarios'=>[array('dia'=>'4','horaInicio'=>'20:00:00','horaFin'=>'23:00:00')],
        ];

        return $this->responseJson(['exito'=>$this->extras->AgregarActividad($insert_data)]);
    }
}