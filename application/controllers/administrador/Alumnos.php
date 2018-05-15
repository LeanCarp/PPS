<?php

class Alumnos extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/Extras');
         $this->load->library('CapaDeNegocio/Usuario');

    }

    public function AgregarAlumno()
    {
        $username = $this->rest->post('dni');
		$password = $this->rest->post('dni');
		$email = $this->rest->post('email');
		$additional_data = array(
								'first_name' => $this->rest->post('first_name'),
								'last_name' => $this->rest->post('last_name'),
                                'phone'=> $this->rest->post('phone'),
                                'anioIngreso'=>$this->rest->post('anioIngreso'),
                                'carrera'=>$this->rest->post('carrera'),
                                'idEscuela'=>$this->rest->post('escuela'),
								);
		$group = array('2'); // Sets user to alumno.

        return $this->responseJson(['exito'=>$this->usuario->register($username, $password, $email, $additional_data, $group)]); 
    }

    public function ObtenerAlumnos()
    {
        $group = array('2');
        return $this->responseJson(['datos'=>$this->usuario->users($group)->result()]);   
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

    public function Actualizar(){

        $this->load->model('User_model');
        $id = $this->rest->post('id');
		$data = array(
                        'first_name' => $this->rest->post('first_name'),
                        'last_name' => $this->rest->post('last_name'),
                        'email' => $this->rest->post('email'),
                        'phone'=> $this->rest->post('phone'),
                        'anioIngreso'=>$this->rest->post('anioIngreso'),
                        'carrera'=>$this->rest->post('carrera'),
                        'idEscuela'=>$this->rest->post('escuela'),
                        );

        return $this->responseJson(['exito'=>$this->usuario->update($id, $data)]);
    }

    public function AgregarActividad()
    {
        $descripcion = $this->rest->post('descripcion');
        $idAlumno = $this->rest->post('idAlumno');
        $horarios = $this->rest->post('horarios');

        $insert_data = [
                    'actividad'=>array('descripcion'=>$descripcion ,'idUsuario'=>$idAlumno),
                    'horarios'=>$horarios,
                    //'horarios'=>[array('dia'=>'4','horaInicio'=>'20:00:00','horaFin'=>'23:00:00')],
                ];
        return $this->responseJson(['exito'=>$this->extras->AgregarActividad($insert_data)]);
    }
}