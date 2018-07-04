<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividad_model extends OWN_Model
{
	public $table = 'actividad'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('descripcion','idUsuario'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
		$this->timestamps = FALSE;
		$this->return_as = 'array';
		$this->has_one['usuario'] = array('foreign_model'=>'User_model','foreign_table'=>'users','foreign_key'=>'id','local_key'=>'idUsuario');
        $this->has_many['horario'] = array('foreign_model'=>'Horario_model','foreign_table'=>'horario','foreign_key'=>'idActividad','local_key'=>'id');

    }
	

	public $rules = array(
		'insert' => array(
				
				'descripcion' => array(
						'field'=>'descripcion',
						'label'=>'Descripcion',
                        'rules'=>'trim|required'),

		),
		
		'update' => array(
				'descripcion' => array(
						'field'=>'descripcion',
						'label'=>'Descripcion',
                        'rules'=>'trim|required'),
			
		),
				
		                    
	);
	

}

?>