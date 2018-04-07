<?php

class Comidas extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->model('Comidas_model');
	}

	//Devuelve todas las comidas de una/todas la/las categorias habilitada/NOhab
	public function getElementoMenu($categoriaID=null)
	{
		$restoID=$this->rest->post('casaDeComidas');
		$response["categorias"]=array();

		if (!is_null($categoriaID))
		{
			$categoriaID=str_replace('.', ',', $categoriaID);
		}

		$response["categorias"]=$this->Comidas_model->
							obtenerCategoria($restoID,$categoriaID);
		
		for ($i=0; $i < count($response["categorias"]); $i++) { 
			$response["categorias"][$i]["comidas"]=array();
			$response["categorias"][$i]["comidas"]=
				$this->Comidas_model->porCategoria($response["categorias"][$i]['id']);

				for ($j=0; $j < count($response["categorias"][$i]['comidas']); $j++) { 
					$response["categorias"][$i]['comidas'][$j]['conceptos']=$this->Comidas_model->conceptos($response["categorias"][$i]['comidas'][$j]['id']);
				}
		}

		$response["code"]=(count($response["categorias"])>0)?200:0;

		$this->responseJson($reponse);
	}

	//Se encarga de marcar como $valor el atributo eliminada
	public function setEliminada($comidasIDs=null,$valor=null)
	{
		//validar id
		if (!is_null($comidasIDs) && !is_null($valor))
		{
			$comidasIDs = str_replace('.',',',$comidasIDs);	
			$valor=intval($valor);
			$response = array();
			$sinError=true;
				
			$sinError=$sinError&&$this->Comidas_model->setEliminada($comidasIDs,$valor);

			$response["code"]=$sinError?200:0;
		}

		else 
		{
			$response["code"]=0;
		}

		$this->responseJson($reponse);
	}

	//Se encarga de marcar como $valor el atributo disponible
	public function setDisponible($comidasIDs=null,$valor=null)
	{
		//validar id
		$response = array();
		
		if (!is_null($comidasIDs) && !is_null($valor))
		{
			$comidasIDs = str_replace('.',',',$comidasIDs);	
			$valor=intval($valor);
			$sinError=true;

			$sinError=$sinError&&$this->Comidas_model->setDisponible($comidasIDs,$valor);

			$response["code"]=$sinError?200:401;
		}

		else 
		{
			$response["code"]=401;
		}

		$this->responseJson($reponse);
	}
}
?>