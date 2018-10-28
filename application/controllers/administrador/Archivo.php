<?php

class Archivo extends OWN_Controller{	

	public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->logic('Bedelia');
        $this->load->logic('ManejoArchivo');
    }

    public function AgregarArchivo()
    {
        $accion_exitosa = true;

        $titulo = $this->rest->post('titulo');
        $descripcion = $this->rest->post('descripcion');
        $ruta = $this->rest->post('ruta');
        $idMateria = $this->rest->post('idMateria');
        $tipo = $this->rest->post('tipo');

        $insert_data = [
            'titulo'=>$titulo,
            'descripcion'=>$descripcion,
            'idMateria'=>$idMateria,
            'ruta'=>$ruta,
            'idCategoriaArchivo'=> $tipo                        
        ];

        $uploading = null;
        if ($tipo==2)//Tipo 1=Link | 2=Archivo
        {            
            $uploading = $this->manejoarchivo->SubirUnArchivo('file','materia','offimatic');
            $accion_exitosa = $uploading['success'];
            $insert_data['ruta'] = $uploading['file_path'];
        }
                
        return $this->responseJson([
            'exito'         => ( $accion_exitosa && $this->manejoarchivo->AgregarArchivo($insert_data) ),
            'mensaje_error' => $uploading['message'] 
        ]);    
    }

    public function Leer()
    {
       // var_dump($this->rest->post('id'));die();
        $id = $this->rest->post('id');
        $data = $this->manejoarchivo->ObtenerArchivo($id);
        return $this->responseJson(['datos'=>$data]);
        
    }

      public function ObtenerArchivosMateria()
    {
        
        $id = $this->rest->post('id');
        $data = $this->bedelia->ObtenerMateria($id);
        return $this->responseJson(['datos'=>$data]);
    }

      public function ActualizarArchivo()
    {
        $id = $this->rest->post('id');
        $titulo = $this->rest->post('titulo');
        $descripcion = $this->rest->post('descripcion');
        //$ruta = $this->rest->post('ruta');
        //$idMateria = $this->rest->post('idMateria');
        //$tipo=$this->rest->post('tipo');

        $update_data = [
            'titulo'=>$titulo,
            'descripcion'=>$descripcion,
            //'idMateria'=>$idMateria,
            //'ruta'=>$ruta,
            //'idCategoriaArchivo'=> $tipo                        
        ];
        return $this->responseJson(['exito'=>$this->manejoarchivo->ActualizarArchivo($update_data,$id)]);

    }

    



}