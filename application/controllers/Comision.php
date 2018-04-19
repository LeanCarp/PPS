<?php

class Comision  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->library('CapaDeNegocio/Bedelia');
	}

    public function Agregar()
    {
        
        $insert_data = [
                            'comision'=>array('cuatrimestre'=>'2do','anio'=>'2018','idMateria'=>'1','nombreMateria'=>'Analisis 2' ),
                            'horarios'=>[array('dia'=>'4','horaInicio'=>'20:00:00','horaFin'=>'23:00:00')],
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