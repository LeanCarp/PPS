<?php


class User extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
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

}
?>