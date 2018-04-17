<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesor_model extends OWN_Model
{
	public $table = 'profesor'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('nombre','apellido'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
        $this->timestamps = FALSE;
		
		$this->has_many['dicta'] = array('foreign_model'=>'Dicta_model','foreign_table'=>'dicta','foreign_key'=>'idProfesor','local_key'=>'id');
	}

	public $rules = array(
		'insert' => array(
				
				'nombre' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),
                'apellido' => array(
						'field'=>'apellido',
						'label'=>'Apellido',
						'rules'=>'trim|required'),
		),
		
		'update' => array(
				'nombre' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),
                 'apellido' => array(
						'field'=>'apellido',
						'label'=>'Apellido',
						'rules'=>'trim|required'),
			
		),
				
		                    
	);
	

}

?>