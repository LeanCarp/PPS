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

    public function AgregarArchivo($data)
    {
        $this->CI->load->model('Archivo_model');
        $this->CI->Examen_model->insert($data);
    }

      public function AgregarCategoria($data)
    {
        $this->CI->load->model('Categoriaarchivo_model');
        $this->CI->Categoriaarchivo_model->insert($data);
    }

    public function ObtenerCategoria($id=NULL)
    {
        $this->CI->load->model('Categoriaarchivo_model');
        //Si se pasó un id se busca la comision correspondiente.
        if(is_null($id))
                return  $this->CI->Categoriaarchivo_model->with_archivo()->get_all();
        //Si no se pasó nada, se buscan todas.
            return  $this->CI->Categoriaarchivo_model->with_archivo()->get($id);
    }

    



}