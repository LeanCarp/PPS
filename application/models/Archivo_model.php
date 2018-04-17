<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archivo_model extends OWN_Model
{
	public $table = 'archivo'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('titulo' ,'descripcion','ruta' ,'idMateria','idCategoriaArchivo'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
        parent::__construct();
        $this->timestamps = FALSE;
		$this->has_one['materia'] = array('foreign_model'=>'Materia_model','foreign_table'=>'materia','foreign_key'=>'id','local_key'=>'idMateria');
		$this->has_one['categoriaArchivo'] = array('foreign_model'=>'Categoriaarchivo_model','foreign_table'=>'categoriaarchivo','foreign_key'=>'id','local_key'=>'idCategoriaArchivo');

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
                'ruta' => array(
						'field'=>'ruta',
						'label'=>'Ruta',
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
                'ruta' => array(
						'field'=>'ruta',
						'label'=>'Ruta',
                        'rules'=>'trim|required'),
			
		),
				
		                    
	);
	

}

?>