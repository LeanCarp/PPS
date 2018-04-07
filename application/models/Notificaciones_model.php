<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificaciones_model extends CI_MODEL
{
	/*-------------------PREPARACION DE DATOS----------------------*/

      //Establece los tipos de datos para las notifiaciones
      public function formatearNotificaciones($lasNotificaciones)
      {
        for ($i=0; $i < count($lasNotificaciones); $i++) { 
          $lasNotificaciones[$i]['atendido'] 	= $lasNotificaciones[$i]['atendido']=='1';
          $lasNotificaciones[$i]['data'] 		= json_decode($lasNotificaciones[$i]['data'], true);
          foreach (['casadecomidaID','id','mesaID','mesaNUM','ticketID','tipoNotificacion'] as $integer_value) {
          	$lasNotificaciones[$i][$integer_value] = intval( $lasNotificaciones[$i][$integer_value] ); 
          }
        }

        return $lasNotificaciones;
      }
	/*-------------------------------------------------------------*/

	//Realiza el cambio de estado a atendido
	public function atender($notificacionesIDs,$restoID)
	{
		$datos=array(
                'atendido' => '1');
        $cerrada=$this->db->update('notificacion', $datos, "id IN ($notificacionesIDs) AND notificacion.casadecomidaID=$restoID");
        return ($cerrada);
	}

  	//Obtiene las notificaciones de una casa de comidas, habilitadas/deshabilitadas/todas
  	public function obtenerPorTipoAtendida($restoID,$tipo='TODAS',$atendida=null)
  	{
  		$query="SELECT *
				      FROM notificacion
				      WHERE notificacion.casadecomidaID=$restoID";


			$tipo=strtoupper($tipo);
			$query.=($tipo=='TODAS')?
			    	'':
				    ' AND notificacion.tipoNotificacion='.$tipo;

			$query.=($atendida==null)?
				    '':
				    ' AND notificacion.atendido='.$atendida;

		    $query.=' ORDER BY tipoNotificacion';

			$notificaciones=$this->db->query($query)->result_array();
    
      	return $this->formatearNotificaciones($notificaciones);
  	}
}

?>