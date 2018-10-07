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
		$this->after_get[] = 'parse_file_path_to_link';
        parent::__construct();
        $this->return_as = 'array';
        $this->timestamps = FALSE;
		$this->has_one['materia'] = array('foreign_model'=>'Materia_model','foreign_table'=>'materia','foreign_key'=>'id','local_key'=>'idMateria');
		$this->has_one['categoriaArchivo'] = array('foreign_model'=>'Categoriaarchivo_model','foreign_table'=>'categoriaarchivo','foreign_key'=>'id','local_key'=>'idCategoriaArchivo');

    }
	
	// Para formatear la url base
	protected function parse_file_path_to_link($data_array)
	{
		$getOnlyOneRow = (
			is_array($data_array) && !empty($data_array) && isSet($data_array[$this->primary_key])
		);

		if($getOnlyOneRow)
			$data_array = [$data_array]; //it is a row and for that we make that trick

		for ($i=0; $i < count($data_array); $i++)
		{
			$rowIsAnArray = is_array($data_array[$i]);

			$ruta = (
				$rowIsAnArray?
				$data_array[$i]['ruta']:
				$data_array[$i]->ruta
			);

			//Se pregunta si no es un link absoluto, es un archivo subido y guardado como ruta relativa
			if(stripos($ruta, 'http://') === false && stripos($ruta, 'https://') === false)
			{
				if($rowIsAnArray)
				{
					$data_array[$i]['ruta_web'] = base_url($ruta);
				}
				else
				{
					$data_array[$i]->ruta_web = base_url($ruta);
				}
			}
		}

		$data_array = ($getOnlyOneRow? $data_array[0]: $data_array);

    	return $data_array;
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