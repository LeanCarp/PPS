<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extras {
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

    public function AgregarActividad($data)
    {
        $this->CI->load->model('Actividad_model');
        $this->CI->load->model('Horario_model');

        $id=$this->CI->Actividad_model->insert($data['actividad']);
        
        if($id === FALSE)
                return $id;

        //Si se agregó la actividad correctamente, se procede a agregar los horarios de la misma.
        //cada horario del array deberá contener el formato: horario => array('dia'=>'3','horaInicio'=>'20:00:00', 'horaFin'=>'23:00:00');
        for ($i = 0; $i < count($data['horarios']) ; $i++)             
        {
                $data['horarios'][$i]['idActividad']=$id;
                $this->CI->Horario_model->insert($data['horarios'][$i]);
        }
        return TRUE;

    }

    public function ObtenerActividad($id=NULL)
    {
        $this->CI->load->model('Actividad_model');
        //Si se pasó un id se busca la actividad correspondiente.
        if(is_null($id))
                return  $this->CI->Actividad_model->with_horario()->get_all();
        //Si no se pasó nada, se buscan todas.
            return  $this->CI->Actividad_model->with_horario()->get($id);
    }

      public function ObtenerActividadesUsuario($id)
    {
        $this->CI->load->model('Actividad_model');
         return  $this->CI->Actividad_model->where('idUsuario', $id)->with_horario()->get_all();
    }

    public function EliminarActividad($id)
    {
        $this->CI->load->model('Actividad_model');
        $this->CI->Actividad_model->delete($id);
    }

    public function AgregarInforme($data)
    {
        $this->CI->load->model('Informe_model');
        return $this->CI->Informe_model->insert($data);
    }

    public function ObtenerInforme($id=NULL)
    {
        $this->CI->load->model('Informe_model');
        //Si se pasó un id se busca el informe correspondiente.
        if(is_null($id))
                return  $this->CI->Informe_model->get_all();
        //Si no se pasó nada, se buscan todos.
            return  $this->CI->Informe_model->get($id);
    }

    public function ObtenerInformesUsuario($id)
    {
        $this->CI->load->model('Informe_model');
        //Si se pasó un id se busca el informe correspondiente.
        return  $this->CI->Informe_model->where('idUsuario', $id)->with_usuario()->with_autor()->get_all();
    }
        public function ObtenerInformesTutor($id)
    {
        $this->CI->load->model('Informe_model');
         if(is_null($id))
            return false;
        return  $this->CI->Informe_model->where('idAutor', $id)->with_usuario()->with_autor()->get_all();
    }

      public function ActualizarInforme($data,$id)
    {
        $this->CI->load->model('Informe_model');
        return $this->CI->Informe_model->update($data,$id);
    }

      public function EliminarInforme($id)
    {
        $this->CI->load->model('Informe_model');
        $this->CI->Informe_model->delete($id);
    }

    public function AgregarPais($data)
    {
        $this->CI->load->model('Pais_model');
        return $this->CI->Pais_model->insert($data);
    }

    public function ObtenerPais($id=NULL)
    {
         $this->CI->load->model('Pais_model');
        //Si se pasó un id se busca el pais correspondiente.
        if(is_null($id))
                return  $this->CI->Pais_model->with_ciudad()->get_all();
        //Si no se pasó nada, se buscan todos.
            return  $this->CI->Pais_model->with_ciudad()->get($id);
    }

      public function ActualizarPais($data,$id)
    {
        $this->CI->load->model('Pais_model');
        return $this->CI->Pais_model->update($data,$id);
    }

     public function EliminarPais($id)
    {
        $this->CI->load->model('Pais_model');
        $this->CI->Pais_model->delete($id);
    }

    public function AgregarCiudad($data)
    {
        $this->CI->load->model('Ciudad_model');
        return $this->CI->Ciudad_model->insert($data);
    }

    public function ObtenerCiudad($id=NULL)
    {
         $this->CI->load->model('Ciudad_model');
        //Si se pasó un id se busca la ciudad correspondiente.
        if(is_null($id))
                return  $this->CI->Ciudad_model->with_pais()->with_escuela()->get_all();
        //Si no se pasó nada, se buscan todas.
            return  $this->CI->Ciudad_model->with_pais()->with_escuela()->get($id);
    }

    public function ActualizarCiudad($data,$id)
    {
        $this->CI->load->model('Ciudad_model');
        return $this->CI->Ciudad_model->update($data,$id);
    }

     public function EliminarCiudad($id)
    {
         $this->CI->load->model('Ciudad_model');
        $this->CI->Ciudad_model->delete($id);
    }

    public function AgregarEscuela($data)
    {
        $this->CI->load->model('Escuela_model');
        return $this->CI->Escuela_model->insert($data);
    }

    public function ObtenerEscuela($id=NULL)
    {
         $this->CI->load->model('Escuela_model');
        //Si se pasó un id se busca la escuela correspondiente.
        if(is_null($id))
                return  $this->CI->Escuela_model->with_ciudad()->with_alumnos()->get_all();
        //Si no se pasó nada, se buscan todas.
            return  $this->CI->Escuela_model->with_ciudad()->with_alumnos()->get($id);
    }

      public function ActualizarEscuela($data,$id)
    {
        $this->CI->load->model('Escuela_model');
        return $this->CI->Escuela_model->update($data,$id);
    }

      public function EliminarEscuela($id)
    {
        $this->CI->load->model('Escuela_model');
        $this->CI->Escuela_model->delete($id);
    }



}