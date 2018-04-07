<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comidas_model extends CI_MODEL
{
	/*-------------------PREPARACION DE DATOS----------------------*/

      //Establece los tipos de datos para las comidas
      private function formatearComidas($lasComidas)
      {
        for ($i=0; $i < count($lasComidas); $i++) { 
          $lasComidas[$i]['disponible'] = $lasComidas[$i]['disponible']=='1';
          $lasComidas[$i]['eliminada'] = $lasComidas[$i]['eliminada']=='1';
          $lasComidas[$i]['precio'] = floatval($lasComidas[$i]['precio']);
        }

        return $lasComidas;
      }

      //Establece los tipos de datos para los conceptos
      private function formatearConceptos($losConceptos)
      {
        for ($i=0; $i < count($losConceptos); $i++) { 
        }

        return $losConceptos;
      }
	/*-------------------------------------------------------------*/

	//Devuelve todas las comidas de una/todas la/s categoría/s
	public function obtenerCategoria($restoID,$categoriaID)
	{
    $query="SELECT *
            FROM categoria
            WHERE casadecomidaID=$restoID";

    $query.=(is_null($categoriaID))?
      '':
      " AND id IN ($categoriaID)";
    $categorias=$this->db->query($query)->result_array();
        
    return $categorias;
  }

  //Devuelve las comidas por categoria
  public function porCategoria($categoriasIDs)
  {
    $query="SELECT *
            FROM comida
            WHERE categoriaID=$categoriasIDs";

    $comidas=$this->formatearComidas($this->formatearComidas($this->db->query($query)->result_array()));
        
    return $comidas;
  }

    //Devuelve todos los conceptos de una/todas la/s comida/s
    public function conceptos($comidaID)
    {
      $query="SELECT *
              FROM comida_concepto
              WHERE comida_concepto.comidaID=$comidaID";

      $conceptos=$this->formatearConceptos($this->db->query($query)->result_array());
      
      return $conceptos;
    } 

    //Establece el valor de comidaID en $eliminada
    public function setEliminada($comidaID,$elimiada)
    {
      $datos=array(
                'eliminada' => $elimiada);
      $sinError=$this->db->update('comida', $datos, "id IN ($comidaID)");
      return ($sinError);
    }

    //Establece el valor de comidaID en $disponible
    public function setDisponible($comidaID,$disponible)
    {
    	$datos=array(
                'disponible' => $disponible);
      $sinError=$this->db->update('comida', $datos, "id IN($comidaID)");
      return ($sinError);
    }
}

?>