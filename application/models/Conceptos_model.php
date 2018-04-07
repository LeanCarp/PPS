<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conceptos_model extends CI_MODEL
{
	/*-------------------PREPARACION DE DATOS----------------------*/
		
		//Establece los tipos de datos para los conceptos
    	private function formatearConceptos($losConceptos)
      	{
        	for ($i=0; $i < count($losConceptos); $i++) {   
        	}

        return $losConceptos; 
      	}

	      //Establece los tipos de datos para los conceptos
	      private function formatearTiposConceptos($losTiposConceptos)
	      {
	        for ($i=0; $i < count($losTiposConceptos); $i++) { 
	        	$losTiposConceptos[$i]["unico"] = ($losTiposConceptos[$i]["unico"])=='1';
	        }

	        return $losTiposConceptos; 
	      }
	/*-------------------------------------------------------------*/

	//Devuelve el/los concepto/s de un/todos el/los tipo/tipos
	public function obtenerPorTipoConcepto($tipoID)
	{
	    $query="SELECT *
	            FROM concepto
	            WHERE concepto.tipoconceptoID=$tipoID";

	    $conceptos=$this->formatearConceptos($this->db->query($query)->result_array());
	    
      	return $conceptos;
  	}

  	//Devuelve todas los tipos de conceptos
	public function obtenerTipoConcepto($restoID,$tipoID=null)
	{
	    $query="SELECT *
	            FROM tipo_concepto
	            WHERE tipo_concepto.casadecomidaID=$restoID";

	    $query.=(is_null($tipoID))?
	    	'':
	    	" AND id IN ($tipoID)";

	    $tipo=$this->formatearTiposConceptos($this->db->query($query)->result_array());
	    
      	return $tipo;
  	}
}

?>