<?php

class Examen  extends OWN_Controller{	

	public function __construct() {
		parent::__construct();
        
		$this->load->logic('Bedelia');
	}

    public function ObtenerExamenesCursada()
    {
        $id= $this->rest->post('idCursada');
        $data = $this->bedelia->ObtenerCursada($id);
        return $this->responseJson(['datos'=>$data]);
    }
}
?>