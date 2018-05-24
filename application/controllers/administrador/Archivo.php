<?php

class Archivo extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('CapaDeNegocio/Bedelia');
        $this->load->library('CapaDeNegocio/ManejoArchivo');
    }

    public function AgregarArchivo()
    {
        $titulo = $this->rest->post('titulo');
        $descripcion = $this->rest->post('descripcion');
        $ruta = $this->rest->post('ruta');
        $idMateria = $this->rest->post('idMateria');
        $tipo=$this->rest->post('tipo');

        if ($tipo==2)
        {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'txt|xls|xlsx|doc|docx|pdf';
            $config['max_size']             = 10000;

            $this->load->library('upload', $config);


            if ( ! $this->upload->do_upload($ruta))
            {
                    echo("ERROR CARGANDO ARCHIVO");
                    /*
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload_form', $error);*/
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    var_dump($data);
                    /*
                    $this->load->view('upload_success', $data);*/
            
            }
        }
        
        $insert_data = [
                            'titulo'=>$titulo,
                            'descripcion'=>$descripcion,
                            'idMateria'=>$idMateria,
                            'ruta'=>$ruta,
                            'idCategoriaArchivo'=> $tipo                        
                        ];
        return $this->responseJson(['exito'=>$this->manejoarchivo->AgregarArchivo($insert_data)]);
    
    }

    public function Leer()
    {/*
        $id = $this->rest->post('id');
        $data = $this->extras->ObtenerArchivo($id);
        return $this->responseJson(['datos'=>$data]);*/
        
    }

      public function ObtenerArchivosMateria()
    {
        
        $id = $this->rest->post('idUsuario');
        $data = $this->bedelia->ObtenerMateria($id);
        return $this->responseJson(['datos'=>$data]);
    }

    



}