<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examen_model extends OWN_Model
{
	public $table = 'examen'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('idCursada','nota','tipo','descripcion','comentario','fecha'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
		$this->timestamps = FALSE;
		$this->return_as = 'array';
		$this->has_one['cursada'] = array('foreign_model'=>'Cursada_model','foreign_table'=>'cursada','foreign_key'=>'id','local_key'=>'idCursada');
		
	}

	public $rules = array(
		'insert' => array(
				
				'nota' => array(
						'field'=>'nota',
						'label'=>'Nota',
                        'rules'=>'trim|required'),  
                'tipo' => array(
						'field'=>'tipo',
						'label'=>'Tipo',
                        'rules'=>'trim|required'),  
                'descripcion' => array(
						'field'=>'descripcion',
						'label'=>'Descripcion',
                        'rules'=>'trim|required'),  
                'comentario' => array(
						'field'=>'comentario',
						'label'=>'Comentario',
                        'rules'=>'trim|required'),  
                'fecha' => array(
						'field'=>'fecha',
						'label'=>'Fecha',
                        'rules'=>'trim|required'),           
		),
		
		'update' => array(
				'nota' => array(
						'field'=>'nota',
						'label'=>'Nota',
                        'rules'=>'trim|required'),  
                'tipo' => array(
						'field'=>'tipo',
						'label'=>'Tipo',
                        'rules'=>'trim|required'),  
                'descripcion' => array(
						'field'=>'descripcion',
						'label'=>'Descripcion',
                        'rules'=>'trim|required'),  
                'comentario' => array(
						'field'=>'comentario',
						'label'=>'Comentario',
                        'rules'=>'trim|required'),  
                'fecha' => array(
						'field'=>'fecha',
						'label'=>'Fecha',
                        'rules'=>'trim|required'),   			
		),
				
		                    
	);
	

}

?>