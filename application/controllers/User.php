<?php

class User extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}

    public function Agregar()
    {
         $insert_data = array('username'=>'38570363','password'=>'probando','email'=>'email@email.com','first_name'=>'Martin','last_name'=>'Cuba');
        $this->User_model->insert($insert_data);
    }

}
?>