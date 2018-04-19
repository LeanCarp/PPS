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
        /*
        public function foo()
        {
                $this->CI->load->helper('url');
                $this->CI->load->model('blablablabla');
                redirect();
        }

        public function bar()
        {
                echo $this->CI->config->item('base_url');
        }*/

        public function AgregarMateria($data)
        {
                $this->CI->load->model('Materia_model');
                $this->CI->Materia_model->insert($data);
        } 

        public function AgregarProfesor($data)
        {
                $this->CI->load->model('Profesor_model');
                $this->CI->Profesor_model->insert($data);
        
        }

        public function AgregarComision($data)
        {       
                $this->CI->load->model('Comision_model');
                $this->CI->load->model('Horario_model');

                //comision deberá contener el formato: comision => array('cuatrimestre'=>'1ro','anio'=>'2018','idMateria'=>'1','nombreMateria'=>'Analisis 2' );
                $id=$this->CI->Comision_model->insert($data['comision']);
               
                if($id === FALSE)
                        return $id;

                //Si se agregó la comision correctamente, se procede a agregar los horarios de la misma.
                //horario deberá contener el formato: horario => array('dia'=>'3','horaInicio'=>'20:00:00', 'horaFin'=>'23:00:00');
                for ($i = 0; $i < count($data['horarios']) ; $i++)             
                {
                        $data['horarios'][$i]['idComision']=$id;
                        $this->CI->Horario_model->insert($data['horarios'][$i]);
                }
                return TRUE;
        }  

        public function ObtenerComision($id=NULL)
        {
                $this->CI->load->model('Comision_model');
                //Si se pasó un id se busca la comision correspondiente.
                if(is_null($id))
                        return  $this->CI->Comision_model->with_materia('fields:nombre')->with_cursa()->with_horario()->get();
                //Si no se pasó nada, se buscan todas.
                 return  $this->CI->Comision_model->with_materia('fields:nombre')->with_cursa()->with_horario()->get($id);
        
        }

        //Alta de un dicta.
        public function AgregarDicta($data)
        {
                $this->CI->load->model('Dicta_model');
                $this->CI->Dicta_model->insert($data);
        } 

        


        //Alta de una cursada.
        public function AgregarCursada($data)
        {
                $this->CI->load->model('Cursada_model');
                $this->CI->Cursada_model->insert($data);
        }

        //Devuelve cursada con los datos de la comision
        public function ObtenerCursada($id=NULL)
        {
                $this->CI->load->model('Cursada_model');
                //Si se pasó un id se busca la comision correspondiente.
                if(is_null($id))
                        return  $this->CI->Cursada_model->with_comision()->get();
                //Si no se pasó nada, se buscan todas.
                 return  $this->CI->Cursada_model->with_comision()->get($id);
        
        }

}