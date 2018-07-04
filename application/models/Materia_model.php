<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materia_model extends OWN_Model
{
	public $table = 'materia'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('nombre'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
        $this->timestamps = FALSE;
		$this->return_as = 'array';
		$this->has_many['comision'] = array('foreign_model'=>'Comision_model','foreign_table'=>'comision','foreign_key'=>'idMateria','local_key'=>'id');
		$this->has_many['archivo'] = array('foreign_model'=>'Archivo_model','foreign_table'=>'archivo','foreign_key'=>'idMateria','local_key'=>'id');

	}

	public $rules = array(
		'insert' => array(
				
				'nombre' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),           
		),
		
		'update' => array(
				'nombre' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),			
		),
				
		                    
	);
	

}

?>