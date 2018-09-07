<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RunAngular extends OWN_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->ion_auth->logged_in())
		{
			$this->userLogged = $this->ion_auth->user()->row();			
			$userGroup = $this->ion_auth->get_users_groups( $this->userLogged->id )->result();

			// Data for Index method or different use
			$this->data['idUsuario'] = (int)$this->userLogged->id;
			$this->data['idGrupo'] = $userGroup;

			// Loading an setting inside controller configuration
			$this->config->load('run_angular', TRUE);
			$this->run_config = $this->config->item('run_angular');
		}
	}
	
	public function index()
	{	
		$this->load->view('index.php', $this->data);
	}

	public function view($folder, $name = "")
	{
		$viewToCheck = "";
		//Si el name es vacio, quiere decir que en realidad la folder es el name
		if($name=="")
		{
			$name = $folder;
			$folder = "";
			$viewToCheck = "/".$name;
		}
		else
			$viewToCheck = "/".$folder."/".$name;

		$findViewForRole = true;

		if(! in_array($viewToCheck, ["/header","/headerAlumno","/headerTutor","/404"]) )
		{
			$viewsOfRole = $this->getConfigurationForRole();
			$findViewForRole = count( array_filter( $viewsOfRole, function( $elem ) use ($viewToCheck)
				{
					return $elem['view'] == $viewToCheck;
				}
			) ) > 0;
		}

		$this->loadAngularView( $name, [], $folder);	
	}

	public function controllers($folder, $name = "")
	{
		//Si el name es vacio, quiere decir que en realidad la folder es el name
		if($name=="")
		{
			$name = $folder;
			$folder = "";
		}

		//$routesOfRole = $this->run_config['general_data'][$this->data['idGrupo'][0]->id];

		//array_filter($a1,"test_odd")

		$this->loadAngularView( $name, [], $folder);	
	}

	public function routes()
	{
		$routesOfRole = $this->getConfigurationForRole();
		$stringRouteJs= $this->load->view(
			'angular_route_js',
			[ 'routes' => $routesOfRole, 'default' => $this->run_config['general_data']['default'] ],
			TRUE //No renderiza, sino que devuelve un string con lo que se supone renderizaria
		);

		return $this->responseJavascript(
			$stringRouteJs,
			false/*porque es el contenido y no una ruta a un archivo*/
		);

	}

	private function getConfigurationForRole()
	{
		return $this->run_config['general_data'][ $this->data['idGrupo'][0]->id ];
	} 
}
?>