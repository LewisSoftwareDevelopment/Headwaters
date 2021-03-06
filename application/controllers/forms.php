<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forms extends CI_Controller {
	private $custom_errors = array();
	public function __construct()
	{
		parent::__construct();	
		//Sets the variables for the slices
		$this->stencil->slice(array('head','header','footer'));
		$this->load->database();
		$this->stencil->layout('forms_layout');
	}

	public function index()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Forms Dashboard');		

		//Sets the variable $welcome_text to be used in your views
		//$this->stencil->data('welcome_text', 'Welcome to Stencil!');

		//Mixes everything together and loads the home_view as the $content variable in the layout
		//home_view is located here: /views/pages/home_view.php
		$this->stencil->paint('forms/forms_dashboard_view');
	}
	public function company_form()
	{
		//Sets the variable $title to be used in your views
		$this->stencil->title('Company Form');

		//Sets the layout to be home_layout (/views/layouts/home_layout.php)
		$this->stencil->layout('forms_layout');

		$this->form_validation->set_rules('Company', 'Company', 'max_length[255]');			
		$this->form_validation->set_rules('ELDate', 'ELDate', 'max_length[255]');			
		$this->form_validation->set_rules('IBCDate', 'IBCDate', 'max_length[255]');			
		$this->form_validation->set_rules('EstCloseDate', 'EstCloseDate', 'max_length[255]');			
		$this->form_validation->set_rules('ELExpirationDate', 'ELExpirationDate', 'max_length[255]');			
		$this->form_validation->set_rules('Status', 'Status', 'max_length[255]');			
		$this->form_validation->set_rules('DealType', 'DealType', 'max_length[255]');			
		$this->form_validation->set_rules('DealSlot', 'DealSlot', 'max_length[255]');			
		$this->form_validation->set_rules('ClosedDate', 'ClosedDate', 'max_length[255]');			
		$this->form_validation->set_rules('DeadDate', 'DeadDate', 'max_length[255]');			
		$this->form_validation->set_rules('PrimaryBanker', 'PrimaryBanker', 'max_length[255]');			
		$this->form_validation->set_rules('PracticeArea', 'PracticeArea', 'max_length[255]');			
		$this->form_validation->set_rules('Industry', 'Industry', 'max_length[255]');			
		$this->form_validation->set_rules('ProjectedTransactionSize', 'ProjectedTransactionSize', 'max_length[255]');			
		$this->form_validation->set_rules('EnterpiseValue', 'EnterpiseValue', 'max_length[255]');			
		$this->form_validation->set_rules('FinalTransactionSize', 'FinalTransactionSize', 'max_length[255]');			
		$this->form_validation->set_rules('ProjectedFee', 'ProjectedFee', 'max_length[255]');			
		$this->form_validation->set_rules('FeeMinimum', 'FeeMinimum', 'max_length[255]');			
		$this->form_validation->set_rules('EngagmentFee', 'EngagmentFee', 'max_length[255]');			
		$this->form_validation->set_rules('FeeDetails', 'FeeDetails', 'max_length[255]');			
		$this->form_validation->set_rules('SplitToCorporate', 'SplitToCorporate', 'max_length[255]');			
		$this->form_validation->set_rules('MonthlyRetainer', 'MonthlyRetainer', 'max_length[255]');			
		$this->form_validation->set_rules('FinalTotalSucessFee', 'FinalTotalSucessFee', 'max_length[255]');			
		$this->form_validation->set_rules('OwnershipClass', 'OwnershipClass', 'max_length[255]');			
		$this->form_validation->set_rules('ReferralType', 'ReferralType', 'max_length[255]');			
		$this->form_validation->set_rules('ReferralSourceCompany', 'ReferralSourceCompany', 'max_length[255]');			
		$this->form_validation->set_rules('ReferralScourceInd', 'ReferralScourceInd', 'max_length[255]');			
		$this->form_validation->set_rules('Description', 'Description', 'max_length[255]');			
		$this->form_validation->set_rules('TeamSplit1', 'TeamSplit1', 'max_length[255]');			
		$this->form_validation->set_rules('Team1', 'Team1', 'max_length[255]');			
		$this->form_validation->set_rules('TeamSplit2', 'TeamSplit2', 'max_length[255]');			
		$this->form_validation->set_rules('team2', 'Team2', 'max_length[255]');			
		$this->form_validation->set_rules('TeamSplit3', 'TeamSplit3', 'max_length[255]');			
		$this->form_validation->set_rules('Team3', 'Team3', 'max_length[255]');			
		$this->form_validation->set_rules('TeamSplit4', 'TeamSplit4', 'max_length[255]');			
		$this->form_validation->set_rules('Team4', 'Team4', 'max_length[255]');			
		$this->form_validation->set_rules('TeamSplit5', 'TeamSplit5', 'max_length[255]');			
		$this->form_validation->set_rules('Team5', 'Team5', 'max_length[255]');			
		$this->form_validation->set_rules('TeamSplit6', 'TeamSplit6', 'max_length[255]');			
		$this->form_validation->set_rules('Team6', 'Team6', 'max_length[255]');			
		$this->form_validation->set_rules('FeeSplit1', 'FeeSplit1', 'max_length[255]');			
		$this->form_validation->set_rules('FeeTo1', 'FeeTo1', 'max_length[255]');			
		$this->form_validation->set_rules('FeeSplit2', 'FeeSplit2', 'max_length[255]');			
		$this->form_validation->set_rules('FeeTo2', 'FeeTo2', 'max_length[255]');			
		$this->form_validation->set_rules('FeeSplit3', 'FeeSplit3', 'max_length[255]');			
		$this->form_validation->set_rules('FeeTo3', 'FeeTo3', 'max_length[255]');			
		$this->form_validation->set_rules('FeeSplit4', 'FeeSplit4', 'max_length[255]');			
		$this->form_validation->set_rules('FeeTo4', 'FeeTo4', 'max_length[255]');			
		$this->form_validation->set_rules('FeeSplit5', 'FeeSplit5', 'max_length[255]');			
		$this->form_validation->set_rules('FeeTo5', 'FeeTo5', 'max_length[255]');			
		$this->form_validation->set_rules('FeeSplit6', 'FeeSplit6', 'max_length[255]');			
		$this->form_validation->set_rules('FeeTo6', 'FeeTo6', 'max_length[255]');			
		$this->form_validation->set_rules('Paul', 'Paul', 'max_length[11]');			
		$this->form_validation->set_rules('McBroom', 'McBroom', 'max_length[11]');			
		$this->form_validation->set_rules('Pipeline', 'Pipeline', 'max_length[255]');			
		$this->form_validation->set_rules('MonthofClose', 'MonthofClose', 'max_length[255]');			
		$this->form_validation->set_rules('GrossThis', 'GrossThis', 'max_length[255]');			
		$this->form_validation->set_rules('GrossNext', 'GrossNext', 'max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/company_form_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'Company' => @$this->input->post('Company'),
					       	'ELDate' => @$this->input->post('ELDate'),
					       	'IBCDate' => @$this->input->post('IBCDate'),
					       	'EstCloseDate' => @$this->input->post('EstCloseDate'),
					       	'ELExpirationDate' => @$this->input->post('ELExpirationDate'),
					       	'Status' => @$this->input->post('Status'),
					       	'DealType' => @$this->input->post('DealType'),
					       	'DealSlot' => @$this->input->post('DealSlot'),
					       	'ClosedDate' => @$this->input->post('ClosedDate'),
					       	'DeadDate' => @$this->input->post('DeadDate'),
					       	'PrimaryBanker' => @$this->input->post('PrimaryBanker'),
					       	'PracticeArea' => @$this->input->post('PracticeArea'),
					       	'Industry' => @$this->input->post('Industry'),
					       	'ProjectedTransactionSize' => @$this->input->post('ProjectedTransactionSize'),
					       	'EnterpiseValue' => @$this->input->post('EnterpiseValue'),
					       	'FinalTransactionSize' => @$this->input->post('FinalTransactionSize'),
					       	'ProjectedFee' => @$this->input->post('ProjectedFee'),
					       	'FeeMinimum' => @$this->input->post('FeeMinimum'),
					       	'EngagmentFee' => @$this->input->post('EngagmentFee'),
					       	'FeeDetails' => @$this->input->post('FeeDetails'),
					       	'SplitToCorporate' => @$this->input->post('SplitToCorporate'),
					       	'MonthlyRetainer' => @$this->input->post('MonthlyRetainer'),
					       	'FinalTotalSucessFee' => @$this->input->post('FinalTotalSucessFee'),
					       	'OwnershipClass' => @$this->input->post('OwnershipClass'),
					       	'ReferralType' => @$this->input->post('ReferralType'),
					       	'ReferralSourceCompany' => @$this->input->post('ReferralSourceCompany'),
					       	'ReferralScourceInd' => @$this->input->post('ReferralScourceInd'),
					       	'Description' => @$this->input->post('Description'),
					       	'TeamSplit1' => @$this->input->post('TeamSplit1'),
					       	'Team1' => @$this->input->post('Team1'),
					       	'TeamSplit2' => @$this->input->post('TeamSplit2'),
					       	'team2' => @$this->input->post('team2'),
					       	'TeamSplit3' => @$this->input->post('TeamSplit3'),
					       	'Team3' => @$this->input->post('Team3'),
					       	'TeamSplit4' => @$this->input->post('TeamSplit4'),
					       	'Team4' => @$this->input->post('Team4'),
					       	'TeamSplit5' => @$this->input->post('TeamSplit5'),
					       	'Team5' => @$this->input->post('Team5'),
					       	'TeamSplit6' => @$this->input->post('TeamSplit6'),
					       	'Team6' => @$this->input->post('Team6'),
					       	'FeeSplit1' => @$this->input->post('FeeSplit1'),
					       	'FeeTo1' => @$this->input->post('FeeTo1'),
					       	'FeeSplit2' => @$this->input->post('FeeSplit2'),
					       	'FeeTo2' => @$this->input->post('FeeTo2'),
					       	'FeeSplit3' => @$this->input->post('FeeSplit3'),
					       	'FeeTo3' => @$this->input->post('FeeTo3'),
					       	'FeeSplit4' => @$this->input->post('FeeSplit4'),
					       	'FeeTo4' => @$this->input->post('FeeTo4'),
					       	'FeeSplit5' => @$this->input->post('FeeSplit5'),
					       	'FeeTo5' => @$this->input->post('FeeTo5'),
					       	'FeeSplit6' => @$this->input->post('FeeSplit6'),
					       	'FeeTo6' => @$this->input->post('FeeTo6'),
					       	'Paul' => @$this->input->post('Paul'),
					       	'McBroom' => @$this->input->post('McBroom'),
					       	'Pipeline' => @$this->input->post('Pipeline'),
					       	'MonthofClose' => @$this->input->post('MonthofClose'),
					       	'GrossThis' => @$this->input->post('GrossThis'),
					       	'GrossNext' => @$this->input->post('GrossNext')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_company_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
			}
		}
	}
	public function actuals_form()
	{			
		$this->form_validation->set_rules('ThisYearBudgetNet', 'This Year Budget Net', 'trim|max_length[255]');			
		$this->form_validation->set_rules('ThisYearBugetGross', 'This Year Buget Gross', 'trim|max_length[255]');			
		$this->form_validation->set_rules('YTDNetActual', 'YTD Net Actual', 'trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/actuals_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'ThisYearBudgetNet' => @$this->input->post('ThisYearBudgetNet'),
					       	'ThisYearBugetGross' => @$this->input->post('ThisYearBugetGross'),
					       	'YTDNetActual' => @$this->input->post('YTDNetActual')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_actuals_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public function bankers_form()
	{			
		$this->form_validation->set_rules('FirstName', 'First Name', 'trim|max_length[255]');			
		$this->form_validation->set_rules('YTDLast', 'YTD Last', 'trim|max_length[255]');			
		$this->form_validation->set_rules('LastName', 'Last Name', 'trim|max_length[255]');			
		$this->form_validation->set_rules('Active', 'Active', 'trim|max_length[11]');			
		$this->form_validation->set_rules('Name', 'Name', 'trim|max_length[255]');			
		$this->form_validation->set_rules('BudgetYear', 'Budget Year', 'trim|max_length[255]');			
		$this->form_validation->set_rules('StartDate', 'Start Date', 'trim|max_length[255]');			
		$this->form_validation->set_rules('YTDRevenue', 'YTD Revenue', 'trim|max_length[255]');			
		$this->form_validation->set_rules('LastYearRev', 'Last Year Rev', 'trim|max_length[255]');			
		$this->form_validation->set_rules('PriorYearRev', 'Prior Year Rev', 'trim|max_length[255]');			
		$this->form_validation->set_rules('LastYearRank', 'Last Year Rank', 'trim|max_length[255]');			
		$this->form_validation->set_rules('YTDClosing', 'YTD Closing', 'trim|max_length[255]');			
		$this->form_validation->set_rules('LastYearClosing', 'Last Year Closing', 'trim|max_length[255]');			
		$this->form_validation->set_rules('YTDIBC', 'YTD IBC', 'trim|max_length[255]');			
		$this->form_validation->set_rules('YTDEngagements', 'YTD Engagements', 'trim|max_length[255]');			
		$this->form_validation->set_rules('TotalCurrentEngagments', 'Total Current Engagments', 'trim|max_length[255]');			
		$this->form_validation->set_rules('Wheelhouse', 'Wheelhouse', 'trim|max_length[255]');			
		$this->form_validation->set_rules('Speculative', 'Speculative', 'trim|max_length[255]');			
		$this->form_validation->set_rules('Minimum', 'Minimum', 'trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/bankers_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'FirstName' => @$this->input->post('FirstName'),
					       	'YTDLast' => @$this->input->post('YTDLast'),
					       	'LastName' => @$this->input->post('LastName'),
					       	'Active' => @$this->input->post('Active'),
					       	'Name' => @$this->input->post('Name'),
					       	'BudgetYear' => @$this->input->post('BudgetYear'),
					       	'StartDate' => @$this->input->post('StartDate'),
					       	'YTDRevenue' => @$this->input->post('YTDRevenue'),
					       	'LastYearRev' => @$this->input->post('LastYearRev'),
					       	'PriorYearRev' => @$this->input->post('PriorYearRev'),
					       	'LastYearRank' => @$this->input->post('LastYearRank'),
					       	'YTDClosing' => @$this->input->post('YTDClosing'),
					       	'LastYearClosing' => @$this->input->post('LastYearClosing'),
					       	'YTDIBC' => @$this->input->post('YTDIBC'),
					       	'YTDEngagements' => @$this->input->post('YTDEngagements'),
					       	'TotalCurrentEngagments' => @$this->input->post('TotalCurrentEngagments'),
					       	'Wheelhouse' => @$this->input->post('Wheelhouse'),
					       	'Speculative' => @$this->input->post('Speculative'),
					       	'Minimum' => @$this->input->post('Minimum')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_bankers_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
			}
		}
	}
	public function ellive_form()
	{			
		$this->form_validation->set_rules('January', 'January', 'trim|max_length[255]');			
		$this->form_validation->set_rules('Febuary', 'Febuary', 'trim|max_length[255]');			
		$this->form_validation->set_rules('March', 'March', 'trim|max_length[255]');			
		$this->form_validation->set_rules('April', 'April', 'trim|max_length[255]');			
		$this->form_validation->set_rules('May', 'May', 'trim|max_length[255]');			
		$this->form_validation->set_rules('June', 'June', 'trim|max_length[255]');			
		$this->form_validation->set_rules('July', 'July', 'trim|max_length[255]');			
		$this->form_validation->set_rules('August', 'August', 'trim|max_length[255]');			
		$this->form_validation->set_rules('September', 'September', 'trim|max_length[255]');			
		$this->form_validation->set_rules('October', 'October', 'trim|max_length[255]');			
		$this->form_validation->set_rules('November', 'November', 'trim|max_length[255]');			
		$this->form_validation->set_rules('December', 'December', 'trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/ellive_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'January' => @$this->input->post('January'),
					       	'Febuary' => @$this->input->post('Febuary'),
					       	'March' => @$this->input->post('March'),
					       	'April' => @$this->input->post('April'),
					       	'May' => @$this->input->post('May'),
					       	'June' => @$this->input->post('June'),
					       	'July' => @$this->input->post('July'),
					       	'August' => @$this->input->post('August'),
					       	'September' => @$this->input->post('September'),
					       	'October' => @$this->input->post('October'),
					       	'November' => @$this->input->post('November'),
					       	'December' => @$this->input->post('December')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_ellive_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public function in_market_loi_form()
	{			
		$this->form_validation->set_rules('January', 'January', 'trim|max_length[255]');			
		$this->form_validation->set_rules('Febuary', 'Febuary', 'trim|max_length[255]');			
		$this->form_validation->set_rules('March', 'March', 'trim|max_length[255]');			
		$this->form_validation->set_rules('April', 'April', 'trim|max_length[255]');			
		$this->form_validation->set_rules('May', 'May', 'trim|max_length[255]');			
		$this->form_validation->set_rules('June', 'June', 'trim|max_length[255]');			
		$this->form_validation->set_rules('July', 'July', 'trim|max_length[255]');			
		$this->form_validation->set_rules('August', 'August', 'trim|max_length[255]');			
		$this->form_validation->set_rules('September', 'September', 'trim|max_length[255]');			
		$this->form_validation->set_rules('October', 'October', 'trim|max_length[255]');			
		$this->form_validation->set_rules('November', 'November', 'trim|max_length[255]');			
		$this->form_validation->set_rules('December', 'December', 'trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/inmarketloi_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'January' => @$this->input->post('January'),
					       	'Febuary' => @$this->input->post('Febuary'),
					       	'March' => @$this->input->post('March'),
					       	'April' => @$this->input->post('April'),
					       	'May' => @$this->input->post('May'),
					       	'June' => @$this->input->post('June'),
					       	'July' => @$this->input->post('July'),
					       	'August' => @$this->input->post('August'),
					       	'September' => @$this->input->post('September'),
					       	'October' => @$this->input->post('October'),
					       	'November' => @$this->input->post('November'),
					       	'December' => @$this->input->post('December')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_in_market_loi_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public function nda_per_month_form()
	{			
		$this->form_validation->set_rules('Date', 'Date', 'trim|max_length[255]');			
		$this->form_validation->set_rules('TotalPerMonth', 'TotalPerMonth', 'trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/nda_per_month_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'Date' => @$this->input->post('Date'),
					       	'TotalPerMonth' => @$this->input->post('TotalPerMonth')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_nda_per_month_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public function referral_company_form()
	{			
		$this->form_validation->set_rules('Name', 'Name', 'trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/referral_company_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'Name' => @$this->input->post('Name')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_referral_company_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public function referral_individual_form()
	{			
		$this->form_validation->set_rules('Name', 'Name', 'trim|max_length[255]');			
		$this->form_validation->set_rules('LastName', 'LastName', 'trim|max_length[255]');			
		$this->form_validation->set_rules('FirstName', 'FirstName', 'trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/referral_individual_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'Name' => @$this->input->post('Name'),
					       	'LastName' => @$this->input->post('LastName'),
					       	'FirstName' => @$this->input->post('FirstName')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_referral_individual_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public function ssvsop_form()
	{			
		$this->form_validation->set_rules('January', 'January', 'trim|max_length[255]');			
		$this->form_validation->set_rules('Febuary', 'Febuary', 'trim|max_length[255]');			
		$this->form_validation->set_rules('March', 'March', 'trim|max_length[255]');			
		$this->form_validation->set_rules('April', 'April', 'trim|max_length[255]');			
		$this->form_validation->set_rules('May', 'May', 'trim|max_length[255]');			
		$this->form_validation->set_rules('June', 'June', 'trim|max_length[255]');			
		$this->form_validation->set_rules('July', 'July', 'trim|max_length[255]');			
		$this->form_validation->set_rules('August', 'August', 'trim|max_length[255]');			
		$this->form_validation->set_rules('September', 'September', 'trim|max_length[255]');			
		$this->form_validation->set_rules('October', 'October', 'trim|max_length[255]');			
		$this->form_validation->set_rules('November', 'November', 'trim|max_length[255]');			
		$this->form_validation->set_rules('December', 'December', 'trim|max_length[255]');			
		$this->form_validation->set_rules('SS', 'SS', 'trim|max_length[255]');			
		$this->form_validation->set_rules('Live', 'Live', 'trim|max_length[255]');			
		$this->form_validation->set_rules('Ssovel', 'SSOVEL', 'trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/ssvsop_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'January' => @$this->input->post('January'),
					       	'Febuary' => @$this->input->post('Febuary'),
					       	'March' => @$this->input->post('March'),
					       	'April' => @$this->input->post('April'),
					       	'May' => @$this->input->post('May'),
					       	'June' => @$this->input->post('June'),
					       	'July' => @$this->input->post('July'),
					       	'August' => @$this->input->post('August'),
					       	'September' => @$this->input->post('September'),
					       	'October' => @$this->input->post('October'),
					       	'November' => @$this->input->post('November'),
					       	'December' => @$this->input->post('December'),
					       	'SS' => @$this->input->post('SS'),
					       	'Live' => @$this->input->post('Live'),
					       	'Ssovel' => @$this->input->post('Ssovel')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_ssvsop_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public function utilization_targets_form()
	{			
		$this->form_validation->set_rules('IBCPerMD', 'IBC Per MD', 'trim|max_length[255]');			
		$this->form_validation->set_rules('IBCTotalMD', 'IBC Total MD', 'trim|max_length[255]');			
		$this->form_validation->set_rules('IBCYTDTarget', 'IBC YTD Target', 'trim|max_length[255]');			
		$this->form_validation->set_rules('ELPerMD', 'EL Per MD', 'trim|max_length[255]');			
		$this->form_validation->set_rules('ELTotalMD', 'EL Total MD', 'trim|max_length[255]');			
		$this->form_validation->set_rules('ELYTDTarget', 'ELY TD Target', 'trim|max_length[255]');			
		$this->form_validation->set_rules('ClosingPerMD', 'Closing Per MD', 'trim|max_length[255]');			
		$this->form_validation->set_rules('ClosingTotalMD', 'Closing Total MD', 'trim|max_length[255]');			
		$this->form_validation->set_rules('ClosingYTDMD', 'Closing YTD MD', 'trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->stencil->paint('forms/utilization_targets_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'IBCPerMD' => @$this->input->post('IBCPerMD'),
					       	'IBCTotalMD' => @$this->input->post('IBCTotalMD'),
					       	'IBCYTDTarget' => @$this->input->post('IBCYTDTarget'),
					       	'ELPerMD' => @$this->input->post('ELPerMD'),
					       	'ELTotalMD' => @$this->input->post('ELTotalMD'),
					       	'ELYTDTarget' => @$this->input->post('ELYTDTarget'),
					       	'ClosingPerMD' => @$this->input->post('ClosingPerMD'),
					       	'ClosingTotalMD' => @$this->input->post('ClosingTotalMD'),
					       	'ClosingYTDMD' => @$this->input->post('ClosingYTDMD')
						);
					
			// run insert model to write data to db
		
			if ($this->forms_model->save_utilization_targets_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('forms');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public  function check_file($field,$field_value)
	{
		if(isset($this->custom_errors[$field_value]))
		{
			$this->form_validation->set_message('check_file', $this->custom_errors[$field_value]);
			unset($this->custom_errors[$field_value]);
			return FALSE;
		}
		return TRUE;
	}
	function upload_file($config,$fieldname)
	{
		$this->load->library('upload');
		$this->upload->initialize($config);
		$this->upload->do_upload($fieldname);
		$error = $this->upload->display_errors();
		if(empty($error))
		{
			$data = $this->upload->data();
			$this->$fieldname = $data['file_name'];
		}
		else
		{
			$this->custom_errors[$fieldname] = $error;
		}
	}

}

/* End of file forms.php */
/* Location: ./application/controllers/forms.php */