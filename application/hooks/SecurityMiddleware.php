<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecurityMiddleware {

  protected $CI;
  protected $adminGroup = "admin";
  protected $alumnoGroup = "alumnos";
  //protected $tutorGroup = "tutor";

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
    $primerParametroUrl = strtolower( $this->CI->uri->segment(1, '') );
    if( $primerParametroUrl != '' && $primerParametroUrl != 'auth' )
    {
      if( $this->CI->ion_auth->logged_in() )
      {
        //Si NO es usuario administrador
        if( ! $this->CI->ion_auth->in_group($this->adminGroup) )
        {
          if( $this->CI->ion_auth->in_group($this->alumnoGroup) && $primerParametroUrl != 'alumno' )
            redirect('auth/login', 'refresh'); // redirect them to the login page
        
        }
      }
      else
      {
        // redirect them to the login page
        redirect('auth/login', 'refresh');
      }
    }
    return;
  }
}