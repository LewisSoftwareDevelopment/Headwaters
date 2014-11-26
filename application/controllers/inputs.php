<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inputs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		//Sets the variables for the slices
		$this->stencil->slice(array('head','header','footer'));
		$this->load->database();
		$this->stencil->layout('inputs_layout');
	}

	public function index()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Inputs Dashboard');

		//Mixes everything together and loads the home_view as the $content variable in the layout
		//home_view is located here: /views/pages/home_view.php
		$this->stencil->paint('inputs/inputs_dashboard_view');
	}
	public function company_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Company Input');

		$data['company_input'] = $this->inputs_model->get_company_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/company_input_view',$data);

	}
	public function bankers_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Bankers Input');

		$data['banker_input'] = $this->inputs_model->get_banker_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/bankers_input_view',$data);

	}
	public function referral_individual_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Referral Individual Input');

		$data['referral_individual_input'] = $this->inputs_model->get_referral_individual_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/referral_individual_input_view', $data);

	}
	public function referral_company_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Referral Company Input');

		$data['referral_company_input'] = $this->inputs_model->get_referral_company_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/referral_company_input_view',$data);

	}
	public function nda_per_month_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('NDA Per Month Input');

		$data['nda_per_month_input'] = $this->inputs_model->get_nda_per_month_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/nda_per_month_input_view',$data);

	}
	public function ellive_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Elive Input');

		$data['ellive_input'] = $this->inputs_model->get_ellive_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/ellive_input_view',$data);

	}
	public function in_market_loi_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('In Market LOI Input');

		$data['in_market_loi_input'] = $this->inputs_model->get_in_market_loi_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/in_market_loi_input_view',$data);

	}
	public function utilization_targets_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('In Market LOI Input');

		$data['utilization_targets_input'] = $this->inputs_model->get_utilization_targets_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/utilization_targets_input_view',$data);

	}
	public function actuals_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Actuals Input');

		$data['actuals_input'] = $this->inputs_model->get_actuals_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/actuals_input_view',$data);

	}
	public function ssvsop_input()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('SSVSOP Input');

		$data['ssvsop_input'] = $this->inputs_model->get_ssvsop_input();
		
		echo "<pre style='padding-top:75px;'>";
		var_dump($data);
		echo "</pre>";

		$this->stencil->paint('inputs/ssvsop_input_view',$data);

	}
}

/* End of file inputs.php */
/* Location: ./application/controllers/inputs.php */