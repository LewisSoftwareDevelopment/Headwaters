<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inputs_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		// if($this->ion_auth->is_admin())
		// {
		// 	$this->user = 4;
		// }
		// else
		// 	$this->user = NULL;
		// $this->userdata = $this->ion_auth->user($this->user)->row();
	}
	function get_company_input()
	{
		$company_input_query = $this->db->get('company');
		
		if (!$company_input_query)
		{
			return false;
		}
		return $company_input_query->result();
		
	}	
	function get_banker_input()
	{
		$banker_input_query = $this->db->get('bankers');
		
		if (!$banker_input_query)
		{
			return false;
		}
		return $banker_input_query->result();
		
	}
	function get_referral_individual_input()
	{
		$referral_individual_input_query = $this->db->get('referral_individual');
		
		if (!$referral_individual_input_query)
		{
			return false;
		}
		return $referral_individual_input_query->result();
		
	}	
}

/* End of file inputs_model.php */
/* Location: ./application/models/inputs_model.php */