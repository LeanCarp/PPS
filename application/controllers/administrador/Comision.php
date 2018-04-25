<?php

class Comision  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function Agregar()
    {
        $cuatrimestre = $this->rest->post('cuatrimestre');
        $anio = $this->rest->post('anio');
        $idMateria = $this->rest->post('idMateria'); 
        $nombreMateria = $this->rest->post('nombreMateria');
        $horarios = $this->rest->post('horarios');
        
        $insert_data = [
                            'comision'=>array('cuatrimestre'=>$cuatrimestre ,'anio'=>$anio, 'idMateria'=>$idMateria,'nombreMateria'=>$nombreMateria ),
                            'horarios'=>$horarios,
                            //'horarios'=>[array('dia'=>'4','horaInicio'=>'20:00:00','horaFin'=>'23:00:00')],
                        ];
        $this->bedelia->AgregarComision($insert_data);
    }

    public function Leer($id=NULL)
    {
         $data = $this->bedelia->ObtenerComision(2);
         var_dump($data);
        
    }

}
?>