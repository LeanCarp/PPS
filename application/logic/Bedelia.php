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


        public function AgregarMateria($data)
        {
                $this->CI->load->model('Materia_model');
                return  $this->CI->Materia_model->insert($data);
        } 

        public function ObtenerMateria($id=NULL)
        {
                $this->CI->load->model('Materia_model');
                //Si se pasó un id se busca la comision correspondiente.
                if(is_null($id))
                        return  $this->CI->Materia_model->with_archivo()->get_all();
                //Si no se pasó nada, se buscan todas.
                 return  $this->CI->Materia_model->with_archivo()->get($id);
        }

        public function ActualizarMateria($data,$id)
        {
                $this->CI->load->model('Materia_model');
                return $this->CI->Materia_model->update($data,$id);
        }

        public function EliminarMateria($id)
        {
                $this->CI->load->model('Materia_model');
                $this->CI->Materia_model->delete($id);
        }


        public function AgregarProfesor($data)
        {
                $this->CI->load->model('Profesor_model');
                return $this->CI->Profesor_model->insert($data);
        
        }

        public function ObtenerProfesor($id=NULL)
        {
                $this->CI->load->model('Profesor_model');
                //Si se pasó un id se busca la comision correspondiente.
                if(is_null($id))
                        return  $this->CI->Profesor_model->with_dicta()->get_all();
                //Si no se pasó nada, se buscan todas.
                 return  $this->CI->Profesor_model->with_dicta()->get($id);
        }

        public function ActualizarProfesor($data,$id)
        {
                $this->CI->load->model('Profesor_model');
                return $this->CI->Profesor_model->update($data,$id);
        }

         public function EliminarProfesor($id)
        {
                $this->CI->load->model('Profesor_model');
                $this->CI->Profesor_model->delete($id);
        
        }


        public function AgregarComision($data)
        {       
                $this->CI->load->model('Comision_model');
                $this->CI->load->model('Dicta_model');
                $this->CI->load->model('Horario_model');

                //comision deberá contener el formato: comision => array('cuatrimestre'=>'1ro','anio'=>'2018','idMateria'=>'1','nombreMateria'=>'Analisis 2' );
                $id=$this->CI->Comision_model->insert($data['comision']);
               
                if($id === FALSE)
                        return $id;
                
                for ($i=0;$i < count($data['profesores']) ; $i++)
                {
                        $dicta=array(
                                'idProfesor'=>$data['profesores'][$i][0],
                                'nombreProfesor'=>$data['profesores'][$i][1],
                                'idComision'=>$id
                        );
                        $this->CI->Dicta_model->insert($dicta);
                }


                //Si se agregó la comision correctamente, se procede a agregar los horarios de la misma.
                //cada horario del array deberá contener el formato: horario => array('dia'=>'3','horaInicio'=>'20:00:00', 'horaFin'=>'23:00:00');
                for ($i = 0; $i < count($data['horarios']) ; $i++)             
                {
                        $data['horarios'][$i]['idComision']=$id;
                        $this->CI->Horario_model->insert($data['horarios'][$i]);
                }
                return $id;
        }  

        public function ObtenerComision($id=NULL)
        {
                $this->CI->load->model('Comision_model');
                //Si se pasó un id se busca la comision correspondiente.
                if(is_null($id))
                        return  $this->CI->Comision_model->with_materia('fields:nombre')->with_cursa()->with_horario()->with_dicta()->get_all();
                //Si no se pasó nada, se buscan todas.
                 return  $this->CI->Comision_model->with_materia()->with_cursa()->with_horario()->with_dicta()->get($id);
        
        }

        public function ActualizarComision($data,$id)
        {
                $this->CI->load->model('Comision_model');
                $this->CI->Comision_model->update($data,$id);
        
        }

        public function EliminarComision($id)
        {
                $this->CI->load->model('Comision_model');
                $this->CI->Comision_model->delete($id);
        
        }

        

        //Alta de un dicta.
        public function AgregarDicta($data)
        {
                $this->CI->load->model('Dicta_model');
                return $this->CI->Dicta_model->insert($data);
        } 

        public function ActualizarDicta($data,$id)
        {
                $this->CI->load->model('Dicta_model');
                $this->CI->Dicta_model->update($data,$id);
        } 

        public function EliminarDicta($id)
        {
                $this->CI->load->model('Dicta_model');
                $this->CI->Dicta_model->delete($id);
        } 
        

        //Alta de una cursada.
        public function AgregarCursada($data)
        {
                $this->CI->load->model('Cursada_model');
                return $this->CI->Cursada_model->insert($data);
        }

        //Devuelve cursada con los datos de la comision y los examenes.
        public function ObtenerCursada($id=NULL)
        {
                $this->CI->load->model('Cursada_model');
                //Si se pasó un id se busca la comision correspondiente.
                if(is_null($id))
                        return  $this->CI->Cursada_model->with_comision()->with_examen()->get_all();
                //Si no se pasó nada, se buscan todas.
                 return  $this->CI->Cursada_model->with_comision()->with_examen()->get($id);
        
        }

        public function ActualizarCursada($data,$id)
        {
                $this->CI->load->model('Cursada_model');
                return $this->CI->Cursada_model->update($data,$id);
        }

        public function EliminarCursada($id)
        {
                $this->CI->load->model('Cursada_model');
                return $this->CI->Cursada_model->delete($id);
        } 


        public function AgregarExamen($data)
        {
                $this->CI->load->model('Examen_model');
                return $this->CI->Examen_model->insert($data);
        }

        public function ActualizarExamen($data,$id)
        {
                $this->CI->load->model('Examen_model');
                $this->CI->Examen_model->update($data,$id);
        }

         public function EliminarExamen($id)
        {
                $this->CI->load->model('Examen_model');
                $this->CI->Examen_model->delete($id);
        }

        public function ObtenerExamen($id)
        {
                $this->CI->load->model('Examen_model');
                return  $this->CI->Examen_model->where('idCursada', $id)->get_all();     
        }


        //Devuelve cursada del usuario
        public function ObtenerCursadasUsuario($id=NULL)
        {
                //$this->CI->load->model('User_model');
                //Si se pasó un id se busca la comision correspondiente.
                //if(is_null($id))
                        //return  $this->CI->User_model->with_cursada()->get_all();
                //Si no se pasó nada, se buscan todas.
                //return  $this->CI->User_model->with_cursada()->get($id);
                $this->CI->load->model('Cursada_model');
                return $this->CI->Cursada_model->where('idUsuario', $id)->with_comision()->get_all();
        
        }


}