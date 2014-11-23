<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		//Sets the variables for the slices
		$this->stencil->slice(array('head','header','footer'));

	}

	public function index()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Dashboard');

		//Sets the layout to be home_layout (/views/layouts/home_layout.php)
		$this->stencil->layout('home_layout');


		$this->stencil->paint('home_view');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */