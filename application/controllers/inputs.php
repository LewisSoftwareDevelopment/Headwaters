<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inputs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		//Sets the variables for the slices
		$this->stencil->slice(array('head','header','footer'));
		$this->load->database();
	}

	public function index()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Inputs Dashboard');

		//Sets the layout to be home_layout (/views/layouts/home_layout.php)
		$this->stencil->layout('inputs_layout');

		//Mixes everything together and loads the home_view as the $content variable in the layout
		//home_view is located here: /views/pages/home_view.php
		$this->stencil->paint('inputs/inputs_dashboard_view');
	}
	public function company_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Company Input');

		//Sets the layout to be home_layout (/views/layouts/home_layout.php)
		$this->stencil->layout('inputs_layout');

		$data['company_input'] = $this->inputs_model->get_company_input();
		
		// echo "<pre style='padding-top:75px;'>";
		// var_dump($data);
		// echo "</pre>";

		$this->stencil->paint('inputs/company_input_view',$data);

	}

}

/* End of file inputs.php */
/* Location: ./application/controllers/inputs.php */