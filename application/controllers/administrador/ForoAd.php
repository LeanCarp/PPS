<?php

class ForoAd extends OWN_Controller{	

	public function __construct() {
        parent::__construct();
        $this->load->library('CapaDeNegocio/Foro');
    }

    public function AgregarCategoria()
    {
        $nombre = $this->rest->post('nombre');

        $insert_data = array('nombre' => $nombre);
       
        return $this->responseJson(['exito'=>$this->foro->AgregarCategoria($insert_data)]);
    }

    public function ActualizarCategoria()
    {
        $nombre = $this->rest->post('nombre');
        $id = $this->rest->post('id');

        $insert_data = array('nombre' => $nombre);
       
        return $this->responseJson(['exito'=>$this->foro->ActualizarCategoria($insert_data, $id)]);
    }

    public function LeerCategoria()
    {
        $id = $this->rest->post('id');
        $data = $this->foro->ObtenerCategoria($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function AgregarTema()
    {
        $estado = $this->rest->post('estado');
        $titulo = $this->rest->post('titulo');
        $visitas = $this->rest->post('visitas');
        $idCategoriaForo = $this->rest->post('idCategoria');

        $insert_data = array('titulo' => $titulo, 'estado' => $estado, 'visitas' => $visitas, 'idCategoriaForo' => $idCategoriaForo);
       
        return $this->responseJson(['exito'=>$this->foro->AgregarTema($insert_data)]);
    }

    public function ActualizarTema()
    {
        $titulo = $this->rest->post('titulo');
        $id = $this->rest->post('id');

        $insert_data = array('titulo' => $titulo);
       
        return $this->responseJson(['exito'=>$this->foro->ActualizarTema($insert_data, $id)]);
    }

    public function EliminarTema()
    {
        $id = $this->rest->post('id');
        return $this->responseJson(['exito'=>$this->foro->EliminarTema($id)]);
    }

    public function ObtenerTema()
    {
        $id = $this->rest->post('id');
        $data = $this->foro->ObtenerTema($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function ObtenerTemasCategoria()
    {
        $id = $this->rest->post('id');
        $data = $this->foro->ObtenerTemasPorCategoria($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function LeerTema()
    {
        $id = $this->rest->post('id');
        $data = $this->foro->ObtenerTema($id);
        return $this->responseJson(['datos'=>$data]);
    }

    public function AgregarMensaje()
    {
        $contenido = $this->rest->post('contenido');
        $fecha = $this->rest->post('fecha');
        $idUsuario = $this->rest->post('idUsuario');
        $idTema = $this->rest->post('idTema');
        $posicion = $this->rest->post('posicion');

        $insert_data = array('contenido' => $contenido, 'fecha' => $fecha, 'idUsuario' => $idUsuario, 'idTema' => $idTema, 'posicion' => $posicion);
       
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