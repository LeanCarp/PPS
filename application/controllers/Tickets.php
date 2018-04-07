<?php

class Tickets extends CI_Controller{

	private function tiene_permiso()
	{
		if (!$this->ion_auth->logged_in())
		{
		   // redirect them to the login page
		   redirect('auth/login', 'refresh');
		}
	}

	private function responseJson( $obj=[] )
	{
		header('Content-Type: application/json');
		echo json_encode( $obj );
		return true;
	}

	public function __construct() {
		parent::__construct();
        $this->tiene_permiso();
		$this->load->model('Tickets_model');
	}

	//Obtiene todos tickets, con sus lineas y los conceptos aplicados
	public function getTickets($mesasIDs=null,$finalizado=null)
	{
		$response=array();
			
		$finalizado=(is_null($finalizado)?$finalizado:$finalizado=='true');
		$mesasIDs=(!is_null($mesasIDs))?str_replace('.', ',', $mesasIDs):null;

		//Obtengo los tockets asociados a las mesasIDs
		$response['Tickets']=$this->Tickets_model->obtnerPorMesaPago($mesasIDs,$finalizado);
		
		//Obtengo las lineas de cada ticket
		for ($i=0; $i < count($response['Tickets']); $i++) { 
			$response['Tickets'][$i]['lineas']=array();
			$response['Tickets'][$i]['lineas']=
				$this->Tickets_model->lineasPorEstado($response['Tickets'][$i]['id']);
		}

		$response['code']=(count($response['Tickets'])>0)?200:0;
		
		$this->responseJson($response);
	}

	public function obtenerLineas($ticketsIDs){
		$ticketsIDs=(!is_null($ticketsIDs))?str_replace('.', ',', $ticketsIDs):null;
		$response['lineas']=$this->Tickets_model->lineasDeTickets($ticketsIDs);
		$response['code']=count($response['lineas'])>0?200:0;

		$this->responseJson($response);
	}

	//Cierra sesiones de las mesas y finaliza los tickets
	public function payTicket($ticketID=null,$mesaID=null)
	{
		$response=array();
		if (!is_null($ticketID)&&!is_null($mesaID))
		{
			$ticketPago=$this->Tickets_model->cerrar($ticketID);
			$mesaCerrada=$this->Tickets_model->cerrarSesion($mesaID);
			$response["code"]=$ticketPago&&$mesaCerrada?200:0;
		}
		
		else 
		{
			$response["code"]=500;
		}

		$this->responseJson($response);
	}

}
?>