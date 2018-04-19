<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Uso de la libreria en DOS pasos
// $this->load->library('Bedelia');
// $this->Bedelia->LaFuncion();
class Bedelia {

        protected $CI;
        protected $parametros;

        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct( $parametros_libreria=[] ) // Ninguno parametro por defecto y por el momento;
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();

                // Assign of the received parameters
                $this->parametros = $parametros_libreria;
        }

        public function foo()
        {
                $this->CI->load->helper('url');
                $this->CI->load->model('blablablabla');
                redirect();
        }

        public function bar()
        {
                echo $this->CI->config->item('base_url');
        }

}