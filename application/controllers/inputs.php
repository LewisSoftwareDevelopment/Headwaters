<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inputs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		//Sets the variables for the slices
		$this->stencil->slice(array('head','header','footer'));

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

}

/* End of file inputs.php */
/* Location: ./application/controllers/inputs.php */