<?php


class User extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
        $this->load->library('Usuario');
        
		$this->load->model('User_model');
	}

    public function AgregarAlumno()
    {
        $username = $this->rest->post('usuario');
		$password = $this->rest->post('contraseña');
		$email = $this->rest->post('email');
		$additional_data = array(
								'first_name' => $this->rest->post('nombre');,
								'last_name' => $this->rest->post('apellido');,
								);
		$group = array('2'); // Sets user to alumno.

        return $this->responseJson(['exito'=>$this->Usuario->register($username, $password, $email, $additional_data, $group)]); 
       
    }

    public function ObtenerAlumnos()
    {
        $group = 2;
        return $this->responseJson(['datos'=>$this->Usuario->users($group)->result()]);   
    }

}
?>