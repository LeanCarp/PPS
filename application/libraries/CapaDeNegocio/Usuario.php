<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Uso de la libreria en DOS pasos
// $this->load->library('Usuario');
// $this->Usuario->LaFuncion();
class Usuario {

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

        // Modelos
        $this->CI->load->model('User_model');
        // Libreria
        $this->CI->load->library('Ion_auth');
            
    }

    /*
        //Metodo V 0.1        
        public function __call($method_name, $args)
        {
            //print "Method $method_name called:\n";
            //var_dump($args);

            if( is_callable([ $this->CI->ion_auth, $method_name]) )
                if( empty($args) )
                    return $this->CI->ion_auth->{$method_name}();
                else
                    return call_user_func_array( [$this->CI->ion_auth, $method_name], $args);
            else if( is_callable([ $this->CI->User_model, $method_name]) )
                if( empty($args) )
                    return $this->CI->User_model->{$method_name}();
                else
                    return call_user_func_array( [$this->CI->User_model, $method_name], $args);
            else
                throw new Exception("Metodo ".$method_name." no encontrado en Ion_auth/User_model."); 
        }
    */
   
   //Metodo V 0.2 
    public function __call($method_name, $args)
    {
        /****En orden de prioridad de ejecucion.***/
        //Es decir que si existe una funcion en mas de un objeto,
        //en el primero que la encuentra por prioridad es donde sera ejecutada.
        $objectArray = [
            $this->CI->ion_auth,
            $this->CI->User_model
        ];

        foreach ($objectArray as $obj)
        {
            if( is_callable([ $obj, $method_name]) )
                return (
                    empty($args) ?
                    $obj->{$method_name}() :
                    call_user_func_array( [ $obj, $method_name], $args)
                );
        }
        
        //Si el metodo no fue encontrade y ejecutado en ningun objeto, se lanza una excepsion
        throw new Exception("Metodo ".$method_name." no encontrado en Ion_auth/User_model."); 
    }
}
?>