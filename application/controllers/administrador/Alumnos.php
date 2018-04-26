<?php

class Alumnos extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/Extras');
    }

    public function agregar(){
        //$alumno = $this->rest->post('alum');
        /* $alumno = array('dni' => 38570658, 'email'=>'leandrolonardi@gmail.com', 'nombre'=>'Leandro', 
        'apellido' => 'Lonardi', 'anioIngreso'=>2013); */
        $nombre = $this->rest->post('nombre');
        $apellido = $this->rest->post('apellido');
        $dni = $this->rest->post('dni'); 
        $anioIngreso = $this->rest->post('anioIngreso');


        /* $username = $alumno['dni'];
		$password = $alumno['dni'];
		$email = $alumno['email'];;
		$additional_data = array(
								'first_name' => $alumno['nombre'],
                                'last_name' => $alumno['apellido'],
                                //'phone' => $alumn['telefono'],
                                'anioIngreso' => $alumno['anioIngreso'],
                                //'carrera' => $alumn['carrera'];
                                //'escuela' => 0;
                                ); */
        $username = $dni;
        $password = $dni;
        $email = $this->rest->post('email');
        $additional_data = array(
                                'first_name' => $nombre,
                                'last_name' => $apellido,
                                //'phone' => $alumn['telefono'],
                                'anioIngreso' => $anioIngreso,
                                //'carrera' => $alumn['carrera'];
                                //'escuela' => 0;
                                );
        $group = array('2'); // Sets user to admin.
        


        return $this->responseJson(['exito'=>$this->ion_auth->register($username, $password, $email, $additional_data, $group)]);
    }
    public function obtenerTodos(){
        $this->load->database();
        $this->db->select('username, first_name, last_name');
        $this->db->from('users');
        $alumnos = $this->db->get();
        return $this->responseJson(['alumnos'=>$alumnos->result()]);
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