<?php

class Notificaciones extends OWN_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('Notificaciones_model');
	}

	//Se encarga de marcar como atendida una notificación si es posible
	public function atendNotificaciones($notificacionesIDs=null)
	{
		//validar id
		$restoID=$this->rest->post('casaDeComidas');
  		if (!is_null($notificacionesIDs)&&!is_null($restoID))
  		{
	  		$notificacionesIDs=str_replace('.', ',', $notificacionesIDs);
			$response=array();
			$atendidas=true;
			
			$atendidas=$this->Notificaciones_model->atender($notificacionesIDs,$restoID);
			$response["code"]=$atendidas?200:500;
  		}

  		else 
  		{
  			$response["code"]=500;
  		}

		$this->responseJson($response);
	}

	//Devuelve las notificaciones todas/atendidas/no atendidas
  	public function getNotificaciones($tipo="TODAS",$atendida=null)
  	{
  		//validar los ID
		$response = array();
		$restoID=$this->rest->post('casaDeComidas');
		$tipo=strtoupper($tipo);
		$notificaciones = ($this->Notificaciones_model->obtenerPorTipoAtendida($restoID,$tipo,$atendida));

		$response["notificaciones"]=$notificaciones;
		$response["code"] = (count($notificaciones)>0)?200:0;

		$this->responseJson($response);
  	}
}
?>
