<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		//Sets the variables for the slices
		$this->stencil->slice(array('head','header'));

	}

	public function index()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Dashboard');

		//Sets the layout to be home_layout (/views/layouts/home_layout.php)
		$this->stencil->layout('home_layout');

		//Adds Font-Awesome to the homepage (/assets/css/font-awesome.css)
		$this->stencil->css('font-awesome');

		//Sets the variable $welcome_text to be used in your views
		//$this->stencil->data('welcome_text', 'Welcome to Stencil!');

		//Mixes everything together and loads the home_view as the $content variable in the layout
		//home_view is located here: /views/pages/home_view.php
		$this->stencil->paint('home_view');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */