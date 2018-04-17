<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends OWN_Model
{
	public $table = 'users'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array('username','password','email','first_name','last_name'); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    
    public function __construct()
	{
		parent::__construct();
	}

	public $rules = array(
		'insert' => array(
				
				'username' => array(
						'field'=>'username',
						'label'=>'Dni',
						'rules'=>'trim|required'),
				
				'password' => array(
						'field'=>'password',
						'label'=>'Contraseña',
						'rules'=>'trim|required'),

				'first_name' => array(
						'field'=>'first_name',
						'label'=>'Nombre',
						'rules'=>'trim|required'),

				'last_name' => array(
						'field'=>'last_name',
						'label'=>'Apellido',
						'rules'=>'trim|required'),
						
				'email' => array(
						'field'=>'email',
						'label'=>'Email',
						'rules'=>'trim|valid_email|required',
						'errors' => array ('required' => 'Este campo es obligatorio',
								'trim' => 'No puede contener espacios',
								'valid_email' => 'El campo es inválido')
				),
		
		'update' => array(
				'username' => array(
						'field'=>'username',
						'label'=>'Dni',
						'rules'=>'trim|required'),
				
				'password' => array(
						'field'=>'password',
						'label'=>'Contraseña',
						'rules'=>'trim|required'),

				'first_name' => array(
						'field'=>'first_name',
						'label'=>'Nombre',
						'rules'=>'trim|required'),

				'last_name' => array(
						'field'=>'last_name',
						'label'=>'Apellido',
						'rules'=>'trim|required'),
						
				'email' => array(
						'field'=>'email',
						'label'=>'Email',
						'rules'=>'trim|valid_email|required',
						'errors' => array ('required' => 'Este campo es obligatorio',
								'trim' => 'No puede contener espacios',
								'valid_email' => 'El campo es inválido')
				),
				
		)                    
	));
	

}

?>