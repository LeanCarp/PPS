<?php

class Comision  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();

		$this->load->logic('Bedelia');
	}

    public function Agregar()
    {
        $cuatrimestre = $this->rest->post('cuatrimestre');
        $anio = $this->rest->post('anio');
        $idMateria = $this->rest->post('idMateria'); 
        $nombreMateria = $this->rest->post('nombreMateria');
        $horarios = $this->rest->post('horarios');
        $profesores = $this->rest->post('profesores');
        
        $insert_data = [
            'comision'=>[
                'cuatrimestre'=>$cuatrimestre ,
                'anio'=>$anio,
                'idMateria'=>$idMateria,
                'nombreMateria'=>$nombreMateria
            ],
            'horarios'=>$horarios,
            'profesores'=>$profesores,
            //'horarios'=>[array('dia'=>'4','horaInicio'=>'20:00:00','horaFin'=>'23:00:00')],
        ];

        return $this->responseJson(['exito'=>$this->bedelia->AgregarComision($insert_data)]);
    }

    public function Leer()
    {

        $id = $this->rest->post('id');
        $data = $this->bedelia->ObtenerComision($id);
        return $this->responseJson(['datos'=>$data]);
    }

    
    public function ObtenerCursadasComision()
    {
       /*  $id = $this->rest->post('idComision')
        $data = $this->bedelia->ObtenerComision($id);
        return $this->responseJson(['datos'=>$data]); */
    }

}
?>