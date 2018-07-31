<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManejoArchivo {
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
        return $this->CI->Archivo_model->insert($data);
    }

     public function ObtenerArchivo($id)
    {
        $this->CI->load->model('Archivo_model');
        return  $this->CI->Archivo_model->get($id);
    }

    public function ActualizarArchivo($data,$id)
    {
        $this->CI->load->model('Archivo_model');
        return $this->CI->Archivo_model->update($data,$id);
    }

      public function AgregarCategoria($data)
    {
        $this->CI->load->model('Categoriaarchivo_model');
        $this->CI->Categoriaarchivo_model->insert($data);
    }

    public function ObtenerCategoria($id=NULL)
    {
        $this->CI->load->model('Categoriaarchivo_model');

        if(is_null($id))
        {
            //Si no se pasó nada, se buscan todas.
            return  $this->CI->Categoriaarchivo_model->with_archivo()->get_all();
        }
        else
        {
            //Si se pasó un id se busca la categoria correspondiente.
            return  $this->CI->Categoriaarchivo_model->with_archivo()->get($id);
        }
    }

    public function SubirUnArchivo($nombre_campo, $nombre_base_para_guardar = '', $tipos_archivos_permitidos = "*")
    {
        // Configurando la libreria de upload nativ a de CodeIgniter
        $this->CI->load->library('upload');

        //Uploading configuration
        $config = [];
        
        switch ($tipos_archivos_permitidos)
        {
            case 'image':
                $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
                break;
            case 'offimatic':
                $config['allowed_types'] = 'txt|xls|xlsx|doc|docx|pps|ppsx|pdf';
                break;
            default:
                $config['allowed_types'] = $tipos_archivos_permitidos; // Todos los tipos de archivos
                break;
        }

        $config['upload_path']      = './assets/uploads/';
        $config['max_size']         = 50000;// En KiloBytes
        $config['file_name']        = $nombre_base_para_guardar.'_'.uniqid().'_'.mt_rand();
        $config['file_ext_tolower'] = true;
        $config['detect_mime']      = true;

        $this->CI->upload->initialize($config);

        $result['success']      = $this->CI->upload->do_upload($nombre_campo);
        $result['message']      = $this->CI->upload->display_errors();

        $file_data = $this->CI->upload->data();

        $result['file_path']    = (
            $result['success'] ?
            $config['upload_path'].$config['file_name'].($file_data['file_ext']!=''? $file_data['file_ext']: ".".pathinfo($_FILES[$nombre_campo]['name'], PATHINFO_EXTENSION)) :
            ''             
        );
        
        return $result;
    }

}