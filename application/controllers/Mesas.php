<?php

class Mesas extends OWN_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('Mesas_model');
	}

	//Establece el estado de la mesaID
	public function setHabilitada($mesasIDs=null,$habilitar=null)
	{
		$restoID=$this->rest->post('casaDeComidas');
		$response = array();
		if (!is_null($mesasIDs)&&!is_null($habilitar)&&!is_null($restoID))
		{		
			$mesasIDs=str_replace('.', ',', $mesasIDs);
			$sinError=true;
			
			$sinError=$sinError&&$this->Mesas_model->setHabilitar($mesasIDs,$restoID,$habilitar);

			$response["code"]=$sinError?200:0;
		}
		
		else 
		{
			$response["code"]=500;
		}

		$this->responseJson($response);
	}

	//Obtiene el ticket a que corresponde la sesion actual en dicha mesa
	public function getTicketSesionActual($mesaID=null)
	{
		$restoID=$this->rest->post('casaDeComidas');
		$response = array();
		if (!is_null($mesaID)&&!is_null($restoID))
		{		
			$ticket = $this->Mesas_model->ticketActual($mesaID);
			$response["ticket"] = $ticket;
			$response["code"] = $ticket!=flase? 200: 0;
		}		
		else 
		{
			$response["code"]=500;
		}

		$this->responseJson($response);
	}

  	//Devuelve las mesas todas/habilitadas/deshabilitadas y todas sus notificaciones
  	public function getMesasPorEstado($habilitada=null)
  	{
  		//validar los ID
  		$restoID=$this->rest->post('casaDeComidas');
		$response = array();
		$response["mesas"] = $this->Mesas_model->obtenerTodasPorEstado($restoID,$habilitada);
		
		$notificacionesAtendidas = false;
		for ($i=0; $i < count($response["mesas"]); $i++) { 
			$response["mesas"][$i]["notificaciones"] = array();
			//Es decir si la mesa tiene un ticket asignado actualmente
			if( $response["mesas"][$i]['ticket'] != false )
			{
				$idTicket = (int) $response["mesas"][$i]["ticket"]["id"];
				$response["mesas"][$i]["notificaciones"] = 
					$this->Mesas_model->notificacionesDelTicket( $idTicket, $notificacionesAtendidas);
			}
		}
		
		$response["code"]=count($response["mesas"])>0?200:0;

		//return json_encode($response);
		$this->responseJson($response);
  	}

  	//Cierra sesion de la/s mesa/s
  	public function closeMesas($mesasIDs=null)
  	{
  		$restoID=$this->rest->post('casaDeComidas');
  		if (!is_null($mesasIDs)&&!is_null($restoID))
  		{
	  		$mesasIDs=str_replace('.', ',', $mesasIDs);
	  		$response=array();
	  		$sinError=true;

			$sinError=$sinError&&$this->Mesas_model->cerrarSesion($mesasIDs,$restoID);

	  		$response["code"]=$sinError?200:500;
  		}

  		else 
  		{
  			$response["code"]=500;
  		}
  			
  		$this->responseJson($response);
		}

		// GET /Mesas/get/:id
		// Obtener una mesa existente por su ID.
		public function get($id = null)
		{
			$response = array();

			if (is_null($id))
			{
				$response["code"] = 500;
			}
			else
			{
				$response["mesa"] = $this->Mesas_model->getById($id)->result_array()[0];
				$response["code"] = 200;
			}
			
			$this->responseJson($response);
		}
		
		// POST /Mesas/add
		// Agrega una nueva mesa.
		public function add()
		{
			$response = array();
			$numero = $this->rest->post('numero');
			$habilitada = $this->rest->post('habilitada');
			$casaDeComidas = $this->rest->post('casaDeComidas');

			if (is_null($numero) || is_null($habilitada) || is_null($casaDeComidas))
			{
				$response["code"] = 500;
			}
			else
			{
				$agregadoCorrectamente = $this->Mesas_model->add($numero, $habilitada, $casaDeComidas);
				$response["code"] = $agregadoCorrectamente ? 200 : 500;
			}
			
			$this->responseJson($response);
		}

		// PUT /Mesas/update
		// Actualiza una mesa existente.
		public function update()
		{
			$response = array();
			$id = $this->rest->put('id');
			$numero = $this->rest->put('numero');
			$habilitada = $this->rest->put('habilitada');

			if (is_null($id) || is_null($numero) || is_null($habilitada))
			{
				$response["code"] = 500;
			}
			else
			{
				$actualizadaCorrectamente = $this->Mesas_model->update($id, $numero, $habilitada);
				$response["code"] = $actualizadaCorrectamente ? 200 : 500;
			}
			
			$this->responseJson($response);
		}
}
?>