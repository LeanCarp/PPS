<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecurityMiddleware {

  protected $CI;
  protected $adminGroup = "admin";
  protected $alumnoGroup = "alumnos";
  protected $tutorGroup = "tutor";

  public function __construct()
  {
    // Assign the CodeIgniter super-object
    $this->CI =& get_instance();
    /*
    $username = 'alumno';
    $password = 'alumno';
    $email = 'alumno@gmail.com';
    $additional_data = array(
                'first_name' => 'Un Alumno',
                'last_name' => 'De ISI',
                );
    $group = array('2'); // Sets user to admin.

    $this->CI->ion_auth->register($username, $password, $email, $additional_data, $group);
    die();
    */
  }

  public function applySecurityRoutesByUser()
  {
    $primerParametroUrl = strtolower($this->CI->uri->segment(1, ''));
    $segundoParametroUrl = strtolower($this->CI->uri->segment(2, 'index'));
    //var_dump( $primerParametroUrl );
    
    // Si la ruta no es la del controlador de AUTENTICACIÓN, que gestiona de forma independiente si el usuario esta logueado o no
    if(
      $primerParametroUrl != 'auth' /* && 
      ( $primerParametroUrl == 'runangular' && $segundoParametroUrl != 'view') */
    )
    {
      $logueado = $this->CI->ion_auth->logged_in();
      //echo "Esta logueado ";
      //var_dump($logueado);
      
      if( $logueado )
      {
        //Si NO es usuario administrador
        if( $primerParametroUrl != 'runangular' && !$this->CI->ion_auth->in_group($this->adminGroup) )
        {
          if( $this->CI->ion_auth->in_group($this->alumnoGroup) && ( $primerParametroUrl != '' && $primerParametroUrl != 'alumno' ) )
            redirect('auth/login', 'refresh'); // echo "ACA1"; // redirect them to the login page

          if( $this->CI->ion_auth->in_group($this->tutorGroup) && ( $primerParametroUrl != '' && $primerParametroUrl != 'tutor' ) )
            redirect('auth/login', 'refresh'); // echo "ACA1"; // redirect them to the login page
        }
      }
      else
      {
        // redirect them to the login page
        redirect('auth/login', 'refresh');
        //echo "ACA2";
      }
    }
    //die();
    return;
  }
}