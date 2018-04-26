<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dicta_model extends OWN_Model
{
	public $table = 'dicta'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('idProfesor','idComision','nombreProfesor'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
        $this->timestamps = FALSE;
		$this->has_one['profesor'] = array('foreign_model'=>'Profesor_model','foreign_table'=>'profesor','foreign_key'=>'id','local_key'=>'idProfesor');
		$this->has_one['comision'] = array('foreign_model'=>'Comision_model','foreign_table'=>'comision','foreign_key'=>'id','local_key'=>'idComision');

    }
	

	public $rules = array(
		'insert' => array(
				
				'idProfesor' => array(
						'field'=>'idProfesor',
						'label'=>'IdProfesor',
                        'rules'=>'trim|required'),
                'idComision' => array(
						'field'=>'idComision',
						'label'=>'IdComision',
                        'rules'=>'trim|required'),
                'nombreProfesor' => array(
						'field'=>'nombreProfesor',
						'label'=>'NombreProfesor',
						'rules'=>'trim|required'),
		),
		
		'update' => array(
				'idProfesor' => array(
						'field'=>'idProfesor',
						'label'=>'IdProfesor',
                        'rules'=>'trim|required'),
                'idComision' => array(
						'field'=>'idComision',
						'label'=>'IdComision',
                        'rules'=>'trim|required'),
                'nombreProfesor' => array(
						'field'=>'nombreProfesor',
						'label'=>'NombreProfesor',
						'rules'=>'trim|required'),
			
		),
				
		                    
	);
	

}

?>