<?php

class Conceptos extends OWN_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('Conceptos_model');
	}

	//Obtiene los tipos de conceptos con sus respectivos conceptos
	public function getConceptos($tiposIDs=null)
	{
		$restoID=$this->rest->post('casaDeComidas');
		$response=array();
		
		if (!is_null($tiposIDs))
		{
			$tiposIDs=str_replace('.', ',', $tiposIDs);
		}

		$response["tipos"]= $this->Conceptos_model->obtenerTipoConcepto($restoID,$tiposIDs);

		for ($i=0; $i < count($response["tipos"]); $i++) { 
			$response["tipos"][$i]["conceptos"] =
					$this->Conceptos_model->obtenerPorTipoConcepto(
							$response["tipos"][$i]["id"]);
		}

		$response["code"]=(count($response["tipos"])>0)?200:0;
		
		$this->responseJson($response);
	}
}
?>