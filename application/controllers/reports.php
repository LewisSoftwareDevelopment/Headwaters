<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		//Sets the variables for the slices
		$this->stencil->slice(array('head','header','footer'));

	}

	public function index()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Reports Dashboard');

		//Sets the layout to be home_layout (/views/layouts/home_layout.php)
		$this->stencil->layout('reports_layout');

		//Mixes everything together and loads the home_view as the $content variable in the layout
		//home_view is located here: /views/pages/home_view.php
		$this->stencil->paint('reports/reports_dashboard_view');
	}

}

/* End of file reports.php */
/* Location: ./application/controllers/reports.php */