<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foro {
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

    public function AgregarCategoria($data)
    {
        $this->CI->load->model('Categoriaforo_model');
        return $this->CI->Categoriaforo_model->insert($data);
    }

    public function ObtenerCategoria($id=NULL)
    {
        $this->CI->load->model('Categoriaforo_model');
        //Si se pasó un id se busca la categoria correspondiente.
        if(is_null($id))
                return  $this->CI->Categoriaforo_model->with_tema()->get_all();
        //Si no se pasó nada, se buscan todas.
            return  $this->CI->Categoriaforo_model->with_tema()->get($id);
    }

     public function ActualizarCategoria($data,$id)
    {
        $this->CI->load->model('Categoriaforo_model');
        return $this->CI->Categoriaforo_model->update($data,$id);
    }

     public function EliminarCategoria($id)
    {
        $this->CI->load->model('Categoriaforo_model');
       return  $this->CI->Categoriaforo_model->delete($id);
    }

    public function AgregarTema($data)
    {
        $this->CI->load->model('Tema_model');
        return $this->CI->Tema_model->insert($data);
    }
    
    public function ObtenerTema($id)
    {
        $this->CI->load->model('Tema_model');
        return  $this->CI->Tema_model->with_categoria()->with_mensajeForo()->get($id);
    }

    public function ObtenerTemasPorCategoria($id){
        $this->CI->load->model('Tema_model');
        return  $this->CI->Tema_model->where('idCategoriaForo', $id)->with_categoria()->with_mensajeForo()->get_all();
    }

     public function ActualizarTema($data,$id)
    {
        $this->CI->load->model('Tema_model');
        return $this->CI->Tema_model->update($data,$id);
    }

     public function EliminarTema($id)
    {
        $this->CI->load->model('Tema_model');
        return $this->CI->Tema_model->delete($id);
    }

    public function AgregarMensaje($data)
    {
        $this->CI->load->model('Mensajeforo_model');
        return $this->CI->Mensajeforo_model->insert($data);
    }
    
    public function ObtenerMensaje($id)
    {
        $this->CI->load->model('Mensajeforo_model');
        return  $this->CI->Mensajeforo_model->where('idTema', $id)->with_usuario()->with_tema()->get_all();
    }

      public function EliminarMensaje($id)
    {
        $this->CI->load->model('Mensajeforo_model');
        return $this->CI->Mensajeforo_model->delete($id);
    }


}