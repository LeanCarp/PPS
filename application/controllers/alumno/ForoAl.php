<?php

class ForoAl extends OWN_Controller{	

	public function __construct() {
        parent::__construct();

        $this->load->logic('Foro');
    }

    public function LeerCategoria()
    {
        $id = $this->rest->post('id');
        $data = $this->foro->ObtenerCategoria($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ObtenerTema()
    {
        $id = $this->rest->post('id');
        $data = $this->foro->ObtenerTema($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ObtenerTemasPorCategoria()
    {
        $id = $this->rest->post('id');
        $data = $this->foro->ObtenerTemasPorCategoria($id);
        return $this->responseJson(['datos'=>$data]);
    }

    /*  
    public function LeerTema()
    {
        $id = $this->rest->post('id');
        $data = $this->foro->ObtenerTema($id);
        return $this->responseJson(['datos'=>$data]);
    }
    */

    public function AgregarMensaje()
    {
        $contenido = $this->rest->post('contenido');
        $fecha = $this->rest->post('fecha');
        $idUsuario = $this->rest->post('idUsuario');
        $idTema = $this->rest->post('idTema');
        $posicion = $this->rest->post('posicion');

        $insert_data = [
            'contenido' => $contenido,
            'fecha' => $fecha,
            'idUsuario' => $idUsuario,
            'idTema' => $idTema,
            'posicion' => $posicion
        ];
       
        return $this->responseJson(['exito'=>$this->foro->AgregarMensaje($insert_data)]);
    }

    public function LeerMensaje()
    {
        $id = $this->rest->post('id');
        $data = $this->foro->ObtenerMensaje($id);
        return $this->responseJson(['datos'=>$data]);
    }
}

?>