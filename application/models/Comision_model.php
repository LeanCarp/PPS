<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comision_model extends OWN_Model
{
	public $table = 'comision'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('cuatrimestre','anio','nombreMateria','idMateria'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
        $this->timestamps = FALSE;
		$this->has_one['materia'] = array('foreign_model'=>'Materia_model','foreign_table'=>'materia','foreign_key'=>'id','local_key'=>'idMateria');
        $this->has_many['horario'] = array('foreign_model'=>'Horario_model','foreign_table'=>'horario','foreign_key'=>'idComision','local_key'=>'id');
		$this->has_many['cursa'] = array('foreign_model'=>'Cursada_model','foreign_table'=>'cursada','foreign_key'=>'idComision','local_key'=>'id');
		$this->has_many['dicta'] = array('foreign_model'=>'Dicta_model','foreign_table'=>'dicta','foreign_key'=>'idComision','local_key'=>'id');

    }
	

	public $rules = array(
		'insert' => array(
				
				'cuatrimestre' => array(
						'field'=>'cuatrimestre',
						'label'=>'Cuatrimestre',
                        'rules'=>'trim|required'),
                'anio' => array(
						'field'=>'anio',
						'label'=>'Anio',
                        'rules'=>'trim|required'),
                'nombreMateria' => array(
						'field'=>'nombreMateria',
						'label'=>'NombreMateria',
						'rules'=>'trim|required'),
		),
		
		'update' => array(
				'cuatrimestre' => array(
						'field'=>'cuatrimestre',
						'label'=>'Cuatrimestre',
                        'rules'=>'trim|required'),
                'anio' => array(
						'field'=>'anio',
						'label'=>'Anio',
                        'rules'=>'trim|required'),
                'nombreMateria' => array(
						'field'=>'nombreMateria',
						'label'=>'NombreMateria',
						'rules'=>'trim|required'),
			
		),
				
		                    
	);
	

}

?>