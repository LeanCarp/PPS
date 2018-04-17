<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horario_model extends OWN_Model
{
	public $table = 'horario'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('dia','horaInicio','horaFin','idActividad','idComision'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
        $this->timestamps = FALSE;
        $this->has_one['comision'] = array('foreign_model'=>'Comision_model','foreign_table'=>'comision','foreign_key'=>'id','local_key'=>'idComision');
        $this->has_one['actividad'] = array('foreign_model'=>'Actividad_model','foreign_table'=>'actividad','foreign_key'=>'id','local_key'=>'idActividad');

	}

	public $rules = array(
		'insert' => array(
				
				'dia' => array(
						'field'=>'dia',
						'label'=>'Dia',
                        'rules'=>'trim|required'), 
                'horaInicio' => array(
						'field'=>'horaInicio',
						'label'=>'HoraInicio',
                        'rules'=>'trim|required'),
                'horaFin' => array(
						'field'=>'horaFin',
						'label'=>'HoraFin',
                        'rules'=>'trim|required'),          
		),
		
		'update' => array(
				'dia' => array(
						'field'=>'dia',
						'label'=>'Dia',
                        'rules'=>'trim|required'),	
                'horaInicio' => array(
						'field'=>'horaInicio',
						'label'=>'HoraInicio',
                        'rules'=>'trim|required'),
                'horaFin' => array(
						'field'=>'horaFin',
						'label'=>'HoraFin',
                        'rules'=>'trim|required'),		
		),
				
		                    
	);
	

}

?>