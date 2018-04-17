<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ciudad_model extends OWN_Model
{
	public $table = 'ciudad'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('nombre','idPais'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
        $this->timestamps = FALSE;
        $this->has_one['pais'] = array('foreign_model'=>'Pais_model','foreign_table'=>'pais','foreign_key'=>'id','local_key'=>'idPais');
	}

	public $rules = array(
		'insert' => array(
				
				'nombre' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),
                'idPais' => array(
						'field'=>'idPais',
						'label'=>'IdPais',
						'rules'=>'trim|required'),
		),
		
		'update' => array(
				'nombre' => array(
						'field'=>'nombre',
						'label'=>'Nombre',
                        'rules'=>'trim|required'),
                 'idPais' => array(
						'field'=>'idPais',
						'label'=>'IdPais',
						'rules'=>'trim|required'),
			
		),
				
		                    
	);
	

}

?>