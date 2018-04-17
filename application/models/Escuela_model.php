<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escuela_model extends OWN_Model
{
	public $table = 'escuela'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('nombre','orientacion','idCiudad'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
        $this->timestamps = FALSE;
        $this->has_one['ciudad'] = array('foreign_model'=>'Ciudad_model','foreign_table'=>'ciudad','foreign_key'=>'id','local_key'=>'idCiudad');
	}

	public $rules = array(
		'insert' => array(
				
				'nombre' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),
                'orientacion' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),
                'idCiudad' => array(
						'field'=>'idCiudad',
						'label'=>'IdCiudad',
						'rules'=>'trim|required'),
		),
		
		'update' => array(
				'nombre' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),
                'orientacion' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),
                 'idCiudad' => array(
						'field'=>'idCiudad',
						'label'=>'IdCiudad',
						'rules'=>'trim|required'),
			
		),
				
		                    
	);
	

}

?>