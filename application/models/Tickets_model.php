<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tickets_model extends CI_MODEL
{  
	/*-------------------PREPARACION DE DATOS----------------------*/
		//Establece los tipos de datos para los tickets
	    public function formatearTickets($losTickets)
	    {
	    	for ($i=0; $i < count($losTickets); $i++) { 
				$losTickets[$i]["total"] = floatval($losTickets[$i]["total"]);
                $losTickets[$i]["pago"] = ( 
                    $losTickets[$i]["fechaHoraFin"] != null &&
                    strtoupper($losTickets[$i]["fechaHoraFin"])=='NULL'
                );
                $losTickets[$i]["lineas"] = $this->lineasDeTickets($losTickets[$i]["id"]);
			}

			return $losTickets;	
	    }

	    //Establece los tipos de datos para las líneas de ticket
	    private function formatearLineasTickets($lasLineas)
	    {
			for ($i=0; $i < count($lasLineas); $i++) { 
				$lasLineas[$i]["precioFinalActual"] = floatval($lasLineas[$i]["precioFinalActual"]);
			  	$lasLineas[$i]["cantidad"] = intval($lasLineas[$i]["cantidad"]);
			  	$lasLineas[$i]["estado"] = intval($lasLineas[$i]["estado"]);
                $lasLineas[$i]['conceptosAplicados'] =
                    $this->conceptosAplicados($lasLineas[$i]["id"], true);
			}

			return $lasLineas;
	    }

	    //Establece los tipos de datos para los Conceptos Aplicados
	    private function formatearConceptosAplicados($losConceptosAplicados)
	    {
	    	for ($i=0; $i < count($losConceptosAplicados); $i++) { 
				$losConceptosAplicados[$i]["costoAgregado"] = 
					floatval($losConceptosAplicados[$i]["costoAgregado"]);
			  	
			  	$losConceptosAplicados[$i]["valorSeleccionado"] = 
			  		$losConceptosAplicados[$i]["valorSeleccionado"]=='1';
			}

			return $losConceptosAplicados;
	    }
	/*-------------------------------------------------------------*/


    //Establece fecha de finalización del ticket como la fecha actual
    public function cerrar($ticketID)
    {
        $datos = array('fechaHoraFin' => 'current_timestamp');//PONE CUALQUEIR COSA
        $cerrada = $this->db->update('ticket', $datos, "id = $ticketID");
        return $cerrada;
    }

    //Cierra la sesion de la mesa indicada
    public function cerrarSesion($mesaID)
    {
        $datos=array(
                'idSesion' => '');
        $cerrada=$this->db->update('mesa', $datos, "id = $mesaID");
        return ($cerrada);
    }

    //Devuelve los tickets de una/todas las mesa/s
    public function obtenerPorMesaPago($mesaID=null,$pago=null)
    {
        $query="SELECT *
    			FROM ticket
                WHERE 1";

        $query.=(!is_null($mesaID))?" AND ticket.mesaID IN ($mesaID)":'';

        if (!is_null($pago))
        {
            $query.=($pago)?
            ' AND ticket.fechaHoraFin IS NOT NULL':
            ' AND ticket.fechaHoraFin IS NULL';   
        }
    	
        $tickets=$this->formatearTickets($this->db->query($query)->result_array());

    	return $tickets;
    }

    //Lineas de tickets de un estado determinado 
    public function lineasPorEstado($ticketID,$estado=null)
    {
		$query = "SELECT *
		            FROM linea_ticket
		            WHERE linea_ticket.ticketID = $ticketID";

		$query.=($estado==null)?
		        '':
		        ' AND linea_ticket.estado = '.$estado;

        $lineas=$this->formatearLineasTickets($this->db->query($query)->result_array());

		return $lineas;
    }

    public function lineasDeTickets($ticketIDs){
        $query = "SELECT *
                    FROM linea_ticket
                    WHERE linea_ticket.ticketID IN ($ticketIDs)";

        $lineas=$this->formatearLineasTickets($this->db->query($query)->result_array());

        return $lineas;
    }

    //Me devuelve los conceptos aplicados/noAplicados en una línea
    public function conceptosAplicados( $lineaID, $valorSeleccionado=null)
    {
        $query="SELECT ca.valorSeleccionado, ca.costoAgregado, con.nombre
                FROM concepto_aplicado ca, comida_concepto cc, concepto con
                WHERE ca.lineaticketID = $lineaID AND
                ca.comidaconceptoID = cc.id AND
                cc.conceptoID = con.id 
        ";

        $query.= (
            ($valorSeleccionado==null) ?
        	'':
        	' AND ca.valorSeleccionado ='.(
                is_numeric($valorSeleccionado) ?
                $valorSeleccionado :
                ($valorSeleccionado==true ? 1:0)
            )
        );

        $conceptos=$this->formatearConceptosAplicados($this->db->query($query)->result_array());

        return $conceptos;
    }
}
 ?>