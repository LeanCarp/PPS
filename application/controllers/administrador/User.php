<?php


class User extends OWN_Controller{	

	public function __construct() {
		parent::__construct();

        $this->load->logic('Usuario');
        $this->load->library('ion_auth');

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
		$group = ['2']; // Sets user to alumno.

        return $this->responseJson(['exito'=>$this->usuario->register($username, $password, $email, $additional_data, $group)]); 
       
    }

      public function ModificarUsuario()
    {
        $id = $this->rest->post('id');
		$password = $this->rest->post('password');
        $data = array(
                'password' => $password,
                    );

        return $this->responseJson(['exito'=>$this->usuario->update($id, $data)]); 
       
    }

    public function ObtenerAlumnos()
    {
        $group = ['2']; // Users group alumno.
        return $this->responseJson(['datos'=>$this->usuario->users($group)->result()]);
    }

    public function ObtenerAdmin(){
        $group = ['1']; // Users group admin.
        return $this->responseJson(['datos'=>$this->usuario->users($group)->result()]);
    }

}
?>