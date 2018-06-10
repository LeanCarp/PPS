<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tema_model extends OWN_Model
{
	public $table = 'tema'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('titulo','estado','visitas','idCategoriaForo'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
		parent::__construct();
		$this->timestamps = FALSE;
		$this->has_one['categoria'] = array('foreign_model'=>'Categoriaforo_model','foreign_table'=>'categoriaforo','foreign_key'=>'id','local_key'=>'idCategoriaForo');
        $this->has_many['mensajeForo'] = array('foreign_model'=>'Mensajeforo_model','foreign_table'=>'mensajeforo','foreign_key'=>'idTema','local_key'=>'id');

	}

	public $rules = array(
		'insert' => array(
				
				'titutlo' => array(
						'field'=>'titutlo',
						'label'=>'Titutlo',
						'rules'=>'trim|required'),
				
				'estado' => array(
						'field'=>'estado',
						'label'=>'Estado',
						'rules'=>'trim|required'),

				'visitas' => array(
						'field'=>'visitas',
						'label'=>'Visitas',
						'rules'=>'trim|required'),

				),
		
		'update' => array(
				'titutlo' => array(
						'field'=>'titutlo',
						'label'=>'Titutlo',
						'rules'=>'trim|required'),
				
				'estado' => array(
						'field'=>'estado',
						'label'=>'Estado',
						'rules'=>'trim|required'),

				'visitas' => array(
						'field'=>'visitas',
						'label'=>'Visitas',
						'rules'=>'trim|required'),
				),
				
		                    
	);
	

}

?>