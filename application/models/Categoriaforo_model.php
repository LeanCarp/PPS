<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoriaforo_model extends OWN_Model
{
	public $table = 'categoriaforo'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('nombre'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
		parent::__construct();
		$this->timestamps = FALSE;
		$this->has_many['tema'] = array('foreign_model'=>'Tema_model','foreign_table'=>'tema','foreign_key'=>'idCategoriaForo','local_key'=>'id');

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