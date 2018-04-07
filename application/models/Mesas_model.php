<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mesas_model extends CI_MODEL
{

    public function __construct()
    {
      $this->load->model('Tickets_model');
      $this->load->model('Notificaciones_model');
      $this->load->helper('qr');
    }

    /*-------------------PREPARACION DE DATOS----------------------*/
      //Establece los tipos de datos para los tickets
      private function formatearMesas($lasMesas)
      {
        for ($i=0; $i < count($lasMesas); $i++) { 
          $lasMesas[$i]["habilitada"] = ($lasMesas[$i]["habilitada"])=='1';
          //Generacion del dato del QR
          $lasMesas[$i]["dataQR"] = QR::codificar(
            $lasMesas[$i]["casadecomidaID"],
            $lasMesas[$i]["numero"],
            $lasMesas[$i]["codigoSeguridad"]
          );
          $lasMesas[$i]["ticket"] = (
            $lasMesas[$i]["idSesion"] != "" ?
            $this->ticketActual($lasMesas[$i]["id"]) :
            false
          ); 
        }

        return $lasMesas; 
      }

      //Establece los tipos de datos para los tickets
      private function formatearTickets($losTickets)
      {
        return $this->Tickets_model->formatearTickets( $losTickets );
      }

      //Establece los tipos de datos para las notifiaciones
      private function formatearNotificaciones($lasNotificaciones)
      {
        return $this->Notificaciones_model->formatearNotificaciones( $lasNotificaciones );
      }

    /*-------------------------------------------------------------*/


    //Verifica si la mesa está habilitada.
  	public function habilitada($mesaID)
  	{
  		$result = $this->db->query( "SELECT habilitada 
                                    FROM mesa 
                                    WHERE mesa.ID=$mesaID"
                                  )->result_array();
    
      return $result[0]['habilitada']=='1';
    }

  	//Habilitar la mesa para el uso del comensal
  	public function setHabilitar($mesasIDs,$restoID,$habilitar)
  	{
      $datos=array(
                'habilitada' => $habilitar);
      $cambioRealizado=$this->db->update('mesa', $datos, "casadecomidaID=$restoID AND id IN($mesasIDs)");
      return ($cambioRealizado);
  	}

  	//Devuelve el ticket asociado al ID de una mesa
  	public function ticketActual($mesaID)
  	{
      $ticketPago = false;
  		$ticket=$this->Tickets_model->obtenerPorMesaPago( $mesaID, $ticketPago);
    
      return ( count($ticket)>0 ? $this->formatearTickets( array($ticket[0]) )[0] : false);
  	}

  	//Obtiene todas las mesas
  	public function obtenerTodasPorEstado($restoID,$habilitada=null)
  	{
      $query="SELECT *
             FROM mesa
             WHERE mesa.casadecomidaID=$restoID";

      $query.=($habilitada==null)?
          '':
          ' AND mesa.habilitada='.$habilitada;

  		$mesas=$this->db->query($query)->result_array();
    
      return $this->formatearMesas($mesas);
  	}

    //Cierra la sesion de la mesa indicada
    public function cerrarSesion($mesasIDs)
    {
      $datos=array(
                'idSesion' => '');
      $cerrada=$this->db->update('mesa', $datos, "idSesion<>'' AND id IN ($mesasIDs)");
      return ($cerrada);
    }

    //Obtiene las notificaciones de una mesa atendida/NOatendida/todas
    public function notificaciones($mesaID,$atendida=null)
    {
      $query="SELECT *
              FROM notificacion
              WHERE notificacion.mesaID=$mesaID";

      $query.=( 
        is_null($atendida)?
        '':
        ' AND notificacion.atendido ='. ($atendida ? 1: 0)
      );
      
      $notificaciones=$this->db->query($query)->result_array();
    
      return $this->formatearNotificaciones($notificaciones);
    }

    //Obtiene las notificaciones de un TICKET atendida/NOatendida/todas
    public function notificacionesDelTicket($ticketID,$atendida=null)
    {
      $query="SELECT *
              FROM notificacion
              WHERE notificacion.ticketID=$ticketID";

      $query.=( 
        is_null($atendida)?
        '':
        ' AND notificacion.atendido ='. ($atendida ? 1: 0)
      );
      
      $notificaciones=$this->db->query($query)->result_array();
    
      return $this->formatearNotificaciones($notificaciones);
    }

    // Agrega una nueva mesa.
    public function getById($id)
    {
      return $this->db->get_where('mesa', array('id' => $id), 1);
    }


    // Genera y devuelve un string aleatorio de logitud dada.
    // Utilizada para el código de seguridad de las mesas.
    private function randomString($length = 6) {
      $str = "";
      $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
      $max = count($characters) - 1;
      for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
      }
      return $str;
    }

    // Agrega una nueva mesa.
    public function add($numero, $habilitada, $casaDeComidas)
    {
      return $this->db->insert('mesa', array(
        'numero' => $numero,
        'casadecomidaID' => $casaDeComidas,
        'habilitada' => $habilitada,
        'idSesion' => '',
        'codigoSeguridad' => $this->randomString(10)
      ));
    }

    // Actualiza una mesa existente.
    public function update($id, $numero, $habilitada)
    {
      $this->db->where('id', $id);
      return $this->db->update('mesa', array(
        'numero' => $numero,
        'habilitada' => $habilitada
      ));
    }
}
 ?>