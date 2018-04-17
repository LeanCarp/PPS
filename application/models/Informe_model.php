<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informe_model extends OWN_Model
{
	public $table = 'informe'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('titulo','descripcion','fecha','idUsuario'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
        $this->timestamps = FALSE;
		$this->has_one['usuario'] = array('foreign_model'=>'User_model','foreign_table'=>'users','foreign_key'=>'id','local_key'=>'idUsuario');

    }
	

	public $rules = array(
		'insert' => array(
				
				'titulo' => array(
						'field'=>'titulo',
						'label'=>'Titulo',
                        'rules'=>'trim|required'),
                'descripcion' => array(
						'field'=>'descripcion',
						'label'=>'Descripcion',
                        'rules'=>'trim|required'),
                'fecha' => array(
						'field'=>'fecha',
						'label'=>'Fecha',
                        'rules'=>'trim|required'),

		),
		
		'update' => array(
				'titulo' => array(
						'field'=>'titulo',
						'label'=>'Titulo',
                        'rules'=>'trim|required'),
                'descripcion' => array(
						'field'=>'descripcion',
						'label'=>'Descripcion',
                        'rules'=>'trim|required'),
                'fecha' => array(
						'field'=>'fecha',
						'label'=>'Fecha',
                        'rules'=>'trim|required'),
			
		),
				
		                    
	);
	

}

?>