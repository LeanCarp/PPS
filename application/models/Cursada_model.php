<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cursada_model extends OWN_Model
{
	public $table = 'cursada'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('estado','nota','idUsuario','idComision'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
		$this->timestamps = FALSE;
		$this->return_as = 'array';
		$this->has_one['comision'] = array('foreign_model'=>'Comision_model','foreign_table'=>'comision','foreign_key'=>'id','local_key'=>'idComision');
		$this->has_one['usuario'] = array('foreign_model'=>'User_model','foreign_table'=>'users','foreign_key'=>'id','local_key'=>'idUsuario');
		$this->has_many['examen'] = array('foreign_model'=>'Examen_model','foreign_table'=>'examen','foreign_key'=>'idCursada','local_key'=>'id');

	}

	public $rules = array(
		'insert' => array(
				
				'estado' => array(
						'field'=>'estado',
						'label'=>'Estado',
                        'rules'=>'trim|required'),           
		),
		
		'update' => array(
				'estado' => array(
						'field'=>'estado',
						'label'=>'Estado',
                        'rules'=>'trim|required'),			
		),
				
		                    
	);
	

}

?>