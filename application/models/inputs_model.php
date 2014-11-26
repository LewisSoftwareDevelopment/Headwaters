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
	function get_referral_company_input()
	{
		$referral_company_input_query = $this->db->get('referral_company');
		
		if (!$referral_company_input_query)
		{
			return false;
		}
		return $referral_company_input_query->result();
	}
	function get_nda_per_month_input()
	{
		$nda_per_month_input_query = $this->db->get('nda_per_month');
		
		if (!$nda_per_month_input_query)
		{
			return false;
		}
		return $nda_per_month_input_query->result();
	}
	function get_ellive_input()
	{
		$ellive_input_query = $this->db->get('ellive');
		
		if (!$ellive_input_query)
		{
			return false;
		}
		return $ellive_input_query->result();
	}
	function get_in_market_loi_input()
	{
		$in_market_loi_input_query = $this->db->get('in_market_loi');
		
		if (!$in_market_loi_input_query)
		{
			return false;
		}
		return $in_market_loi_input_query->result();
	}
	function get_utilization_targets_input()
	{
		$utilization_targets_input_query = $this->db->get('utilization_targets');
		
		if (!$utilization_targets_input_query)
		{
			return false;
		}
		return $utilization_targets_input_query->result();
	}
	function get_actuals_input()
	{
		$actuals_input_query = $this->db->get('actuals');
		
		if (!$actuals_input_query)
		{
			return false;
		}
		return $actuals_input_query->result();
	}
	function get_ssvsop_input()
	{
		$ssvsop_input_query = $this->db->get('ssvsop');
		
		if (!$ssvsop_input_query)
		{
			return false;
		}
		return $ssvsop_input_query->result();
	}
}

/* End of file inputs_model.php */
/* Location: ./application/models/inputs_model.php */